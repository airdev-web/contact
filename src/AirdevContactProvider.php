<?php

namespace Airdev\Contact;

use Illuminate\Support\Facades\Blade;
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
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'contact');
        $this->loadRoutesFrom(__DIR__.'/routes.php');

        Blade::componentNamespace('Airdev\\Contact\\App\\View\\Components', 'airdev-contact');

        // php artisan vendor:publish --tag=airdev-contact-config
        $this->publishes([
            __DIR__.'/config/contact.php' => config_path('contact.php'),
        ], 'airdev-contact-config');

        $this->publishes([
            __DIR__.'/resources/views/mails' => resource_path('views/vendor/airdev/contact'),
        ], 'airdev-contact-mail-view');
    }
}
