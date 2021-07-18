<?php

/**
 * Blog
 */

use Airdev\Contact\App\Mail\ContactMail;

Route::post('contact', function() {

    $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
        'secret' => config('contact.captcha_secret', ''),
        'response' => request()->input('captcha_token'),
    ]);

    if ($response->json()['success']) {
        Mail::to(config('contact.mail_to', 'info@airdev.be'))
            ->send(new ContactMail(request()));

        request()->session()->flash('confirm_mail', true);
    }

    return redirect(route('home'));

})->name('postMailContact');
