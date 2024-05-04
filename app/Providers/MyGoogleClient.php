<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Google_Client;

class MyGoogleClient extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('MyGoogleClient', function ($app) {
            return new Google_Client();
            //return new DependencyClass();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
