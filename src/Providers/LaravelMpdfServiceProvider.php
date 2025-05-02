<?php

namespace LaravelMpdf\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use LaravelMpdf\PdfGenerator;

class LaravelMpdfServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(PdfGenerator::class, function ($app) {
            return new PdfGenerator;
        });

        $this->mergeConfigFrom(__DIR__ . '/../../config/mpdf.php', 'mpdf');
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'laravel-mpdf');

        Blade::componentNamespace('LaravelMpdf\\Views', 'laravel-mpdf');

        $this->publishes([
            __DIR__ . '/../../config/mpdf.php' => config_path('mpdf.php'),
        ], 'config');

        Blade::directive('children', function (): string {
            return "<?php if (isset(\$children)) {
                foreach (\$children as \$child) { echo html_entity_decode(\$child->toHtml()); }
            } ?>";
        });
    }
}
