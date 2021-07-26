<?php

/**
 * Blog
 */

use Airdev\Contact\App\Mail\ContactMail;

$routes = config('contact.mails', []);

foreach (array_keys($routes) as $route_name) {
    $mail_config = $routes[$route_name];

    Route::post($route_name, function() use ($mail_config) {

        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => config('contact.captcha_secret', ''),
            'response' => request()->input('captcha_token'),
        ]);

        if ($response->json()['success']) {
            Mail::to($mail_config['mail_to'])
                ->send(new ContactMail(request(), $mail_config));

            request()->session()->flash('confirm_mail', true);
        }

        return redirect($mail_config['redirect']);

    })->middleware('web')->name($route_name.'_post');
}


