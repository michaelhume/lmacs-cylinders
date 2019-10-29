<?php

namespace nanofab\cylinders;

use Illuminate\Support\ServiceProvider;

class CylindersServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'nanofab');
         $this->loadViewsFrom(__DIR__.'/../resources/views', 'cylinders');
         $this->loadMigrationsFrom(__DIR__.'/../Database/migrations');
         
         // load routes and assign the namespace
         $this->app['router']->namespace('nanofab\cylinders\Http\Controllers')
                ->middleware(['web'])
                ->group(function () {
                    $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
                });

		 // load our scoped factory generator
		 // this may not be good practice - we can have our users seed optionally by publishing the seed files
		 // $this->app->make('Illuminate\Database\Eloquent\Factory')->load(__DIR__ . '/../Database/factories');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
	    
	    $this->mergeConfigFrom(__DIR__.'/../config/cylinders.php', 'cylinders');

        // Register the service the package provides.
        $this->app->singleton('cylinders', function ($app) {
            return new Cylinders;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['cylinders'];
    }
    
    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/cylinders.php' => config_path('cylinders.php'),
        ], 'config');

        // Publishing the views.
        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/nanofab'),
        ], 'views');

        // Publishing assets.
        $this->publishes([
            __DIR__.'/../resources/assets/js' => public_path('js/'),
            __DIR__.'/../resources/assets/css' => public_path('css/'),
        ], 'assets');
        
        // Publishing db seeds.
        $this->publishes([
            __DIR__.'/../Database/factories' => base_path('database/factories'),
            __DIR__.'/../Database/seeds' => base_path('database/seeds'),
            __DIR__.'/../storage/app/public' => base_path('storage/app/public'),
        ], 'database');

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/nanofab'),
        ], 'cylinders.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
