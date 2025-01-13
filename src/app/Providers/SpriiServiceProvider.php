<?php

namespace PatrykSawicki\SpriiApi\app\Providers;

use Illuminate\Support\ServiceProvider;

class SpriiServiceProvider extends ServiceProvider
{
    /**
     * Boot the service provider.
     *
     * @return void
     */
    public function boot(): void
    {
        if (!defined('SPRII_PATH')) {
            define('SPRII_PATH', realpath(__DIR__ . '/../../'));
        }

        if (!file_exists($this->app->databasePath() . '/config/sprii.php')) {
            $this->publishes([SPRII_PATH . '/config/sprii.php' => config_path('sprii.php')], 'config');
        }
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register(): void
    {
        if (!defined('SPRII_PATH')) {
            define('SPRII_PATH', realpath(__DIR__ . '/../../'));
        }

        $this->mergeConfigFrom(SPRII_PATH . '/config/sprii.php', 'sprii');
    }
}
