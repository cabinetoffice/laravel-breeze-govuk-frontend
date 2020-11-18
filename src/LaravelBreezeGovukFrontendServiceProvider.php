<?php

namespace CabinetOffice\LaravelBreezeGovukFrontend;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class LaravelBreezeGovukFrontendServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {

        if (! $this->app->runningInConsole()) {
            return;
        }

        $this->commands([
            Console\InstallCommand::class,
        ]);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [Console\InstallCommand::class];
    }

    /**
     * Register the application services.
     */
//    public function register()
//    {
//        // Automatically apply the package configuration
//        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'laravel-breeze-govuk-frontend');
//
//        // Register the main class to use with the facade
//        $this->app->singleton('laravel-breeze-govuk-frontend', function () {
//            return new LaravelBreezeGovukFrontend;
//        });
//    }
}
