<?php

namespace LaravelMpdf\Tests;

use LaravelMpdf\Providers\LaravelMpdfServiceProvider;
use Orchestra\Testbench\Concerns\WithWorkbench;
use Orchestra\Testbench\TestCase as Orchestra;

abstract class TestCase extends Orchestra
{
    use WithWorkbench;

    protected function getPackageProviders($app)
    {
        return [
            LaravelMpdfServiceProvider::class,
        ];
    }

    protected function defineEnvironment($app)
    {
        $app['config']->set('view.paths', [
            ...$app['config']->get('view.paths'),
            __DIR__ . '/../resources/views',
        ]);
    }

    protected function setUp(): void
    {
        parent::setUp();
    }
}
