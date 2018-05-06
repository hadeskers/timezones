<?php

namespace Hadesker\Timezones;

use Illuminate\Support\ServiceProvider;

class TimezonesServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/views', 'timezones');

        if (! $this->app->routesAreCached()) {
            include __DIR__ . '/routes.php';
        }

        $this->publishes([
            __DIR__.'/views' => base_path('resources/views'),
            __DIR__.'/TimezonesController.php' => app_path('Http/Controllers/TimezonesController.php'),
        ]);
    }

    public function register()
    {
        $this->app->make('Hadesker\Timezones\TimezonesController');
    }
}
