<?php

use Illuminate\Support\Env;

return [
    /**
     * To publish config file run :
     * php artisan vendor:publish --tag=airdev-contact-config
     */

    'debug' => false,

    // Class to apply on the submit button (by default, Bootstrap 5 btn classes are used)
    'submit-btn-class' => 'btn btn-primary',
    // Class to apply on <form>
    'form-class' => '',

    // The google captcha keys
    'captcha_secret' => env('CAPTCHA_SECRET', ''),
    'captcha_public' => env('CAPTCHA_PUBLIC', ''),

    'mails' => [
        'contact' => [ // it will generate post route 'contact_post'
            // The address that should receive the sent mail
            'mail_to' => env('MAIL_TO', ''),

            // Subject of the mail
            'mail_subject' => 'Contact du site ' . env('APP_NAME', ''),

            // Redirection after sended the mail
            'redirect' => '/',

            // The mail view to use (you can publish default view to base on and copy it into your resource folder
            'view' => 'mails.mail',
        ],

        /*
         * Just delete this if you have only one form
         */
        'depannage' => [ // it will generate post route 'depannage_post'
            'mail_to' => env('MAIL_TO', ''),
            'mail_subject' => 'Demande de dépannage du site ' . env('APP_NAME', ''),
            'redirect' => '/',
            'view' => 'mails.depannage',
        ]
    ],
];
