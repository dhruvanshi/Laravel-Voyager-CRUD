<?php

namespace Fen\Fenbooth\Providers;

use Fen\Fenbooth\Console\Commands\InstallCommand;
use Illuminate\Support\ServiceProvider;

class FenBoothServiceProvider extends ServiceProvider
{
    /**
     * Our root directory for this package to make traversal easier
     */
    const PACKAGE_DIR = __DIR__ . '/../../';

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../../routes/web.php');
        $this->loadRoutesFrom(__DIR__ . '/../../routes/api.php');
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'fenbooth');
        $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');
        $this->publishes([
            __DIR__ . '/../../publishable/default' => public_path('storage/person/default'),
        ], 'public');

        // $this->publishes([
        //     __DIR__ . '/../../publishable/js' => public_path('fenbooth/js'),
        // ], 'public');
        // $this->publishes([
        //     __DIR__.'/../../publishable/config' => config_path(),
        // ]);

        // $this->publishes([
        //     __DIR__ . '/../../resources/assets' => resource_path('assets/fen/fenbooth'
        // )], 'vue-components');

        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallCommand::class,
                // InstallCommand::class,
                // NetworkCommand::class,
            ]);
        }
    }
}