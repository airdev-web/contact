<?php

namespace Airdev\Contact;


use Airdev\Blog\App\Nova\PostResource;
use Airdev\Blog\App\Nova\UserResource;
use Airdev\Blog\App\Nova\WebMediaResource;
use Illuminate\Support\ServiceProvider;
use Laravel\Nova\Nova;

class AirdevContactProvider extends ServiceProvider
{
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
        $this->loadRoutesFrom(__DIR__.'/routes.php');
        $this->loadViewsFrom(__DIR__.'/views', 'contact');
        $this->publishes([
            __DIR__.'/config/contact.php' => config_path('contact.php'),
        ]);
    }
}
