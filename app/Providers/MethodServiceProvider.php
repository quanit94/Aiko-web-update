<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repository\Method;

class MethodServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('Method', function(){
            return new Method();
        });
    }
}
