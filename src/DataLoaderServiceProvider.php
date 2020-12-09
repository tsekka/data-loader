<?php

namespace Tsekka\DataLoader;

use Illuminate\Support\ServiceProvider;

class DataLoaderServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        if (file_exists($file = __DIR__ . '/helpers.php')) {
            require $file;
        }

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/data-loader.php' => config_path('data-loader.php'),
            ], 'config');
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/data-loader.php', 'data-loader');

        $this->app->singleton('data-loader', function () {
            return new DataLoader;
        });
    }
}
