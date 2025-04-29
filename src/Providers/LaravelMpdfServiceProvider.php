<?php

namespace Freepeace\LaravelMpdf\Providers;

use Illuminate\Support\ServiceProvider;

class LaravelMpdfServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'laravel-mpdf');
    }
}
