<?php

use Illuminate\Support\Env;

return [
    // The address that should receive the sent mail
    'mail_to' => '',

    // The google captcha keys
    'captcha_secret' => '',
    'captcha_public' => '',

    // Subject of the mail
    'mail_subject' => 'Contact du site ' . env('APP_URL', 'APP_URL'),
];
