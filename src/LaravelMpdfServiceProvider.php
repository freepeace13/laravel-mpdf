<?php

namespace Freepeace\LaravelMpdf;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class LaravelMpdfServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(PdfGenerator::class, function ($app) {
            return new PdfGenerator();
        });

        $this->mergeConfigFrom(__DIR__ . '/../config/mpdf.php', 'mpdf');
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'laravel-mpdf');

        Blade::componentNamespace('Freepeace\\LaravelMpdf\\Views\\Components', 'laravel-mpdf');

        $this->publishes([
            __DIR__ . '/../config/mpdf.php' => config_path('mpdf.php'),
        ], 'config');
    }
}
