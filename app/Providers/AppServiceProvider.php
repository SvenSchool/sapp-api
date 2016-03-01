<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
       $this->app->singleton('api', function($app) {
            return new \App\Utilities\ApiResponse(
                $app['Illuminate\Routing\ResponseFactory'],
                $app['Illuminate\Http\Request']
            );
        });
    }
}
