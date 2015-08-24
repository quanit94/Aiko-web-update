<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repository\Message;

class MessageServiceProvider extends ServiceProvider
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
        $this->app->singleton('Message', function(){
            return new Message();
        });
    }
}
