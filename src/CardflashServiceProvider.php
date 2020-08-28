<?php

namespace Cardflash;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Support\ServiceProvider;

class CardflashServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap any package services.
     *
     * @return void
     * @throws BindingResolutionException
     */
    public function boot()
    {
        $this->registerRoutes();
        $this->registerPublishing();
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'cardflash');
    }

    /**
     * Register
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/cardflash.php',
            'cardflash'
        );

        $this->commands([
            InstallCommand::class,
        ]);
    }

    /**
     * Register the package's routes.
     *
     * @return void
     */
    private function registerRoutes()
    {
        $this->loadRoutesFrom(__DIR__.'/Http/routes.php');
    }

    /**
     * Register the package's publishable resources.
     *
     * @return void
     */
    private function registerPublishing()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../public' => public_path('vendor/cardflash'),
            ], 'cardflash-assets');

            $this->publishes([
                __DIR__.'/../config/cardflash.php' => config_path('cardflash.php'),
            ], 'cardflash-config');
        }
    }

}