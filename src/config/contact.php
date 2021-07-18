<?php

use Illuminate\Support\Env;

return [
    /**
     * To publish config file run :
     * php artisan vendor:publish --tag=airdev-contact-config
     */

    'debug' => false,

    // The address that should receive the sent mail
    'mail_to' => env('MAIL_TO', ''),

    // The google captcha keys
    'captcha_secret' => env('CAPTCHA_SECRET', ''),
    'captcha_public' => env('CAPTCHA_PUBLIC', ''),

    // Subject of the mail
    'mail_subject' => 'Contact du site ' . env('APP_NAME', ''),

    // Redirection after sended the mail
    'redirect' => route('contact'),

    // Class to apply on the submit button (by default, Bootstrap 5 btn classes are used)
    'submit-btn-class' => 'btn btn-primary',
    // Class to apply on <form>
    'form-class' => ''
];
