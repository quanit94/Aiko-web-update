<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repository\Rule;

class RuleServiceProvider extends ServiceProvider
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
        $this->app->singleton('Rule', function(){
            return new Rule();
        });
    }
}
