# Airdev/contact
A package that quickly provide contact form & email send features.

It's only working with Airdev web base project.

## Usage
### Installation
```shell
composer require airdev/contact
```

Next, add it to the Laravel's package providers in ``config/app.php``
```php
/*
 * Package Service Providers...
 */
Airdev\Contact\AirdevContactProvider::class,
```

#### Add Google Recaptcha api to your app.blade.php
```html
<script src="https://www.google.com/recaptcha/api.js"></script>
```

### Publish configuration file
```shell
php artisan vendor:publish --tag=airdev-contact-config
```
You should next update some configuration in ``config/contact.php`` :
```php
/* config/contact.php */

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
```

### Call the blade component into your view
And specify the route name you defined into the `config/contact.php`
```blade
<x-airdev-contact::form routeName="contact"></x-airdev-contact::form>
<x-airdev-contact::form routeName="depannage"></x-airdev-contact::form>
```

#### You can edit the default fields and the sending button
```blade
<x-airdev-contact::form>
    <!--  Editing the fields  -->
    <div>
        <label for="input_name">Nom</label>
        <input required name="name" type="text" id="input_name" placeholder="Votre nom">
    </div>
    <div>
        <label for="input_email">Email</label>
        <input name="email" required type="email" id="input_email" placeholder="Votre email">
    </div>
    <div>
        <label for="input_address">Adresse</label>
        <input name="address" type="text" id="input_address" placeholder="Votre adresse">
    </div>
    <div>
        <label for="input_phone">Téléphone</label>
        <input name="phone" required type="text" id="input_phone" placeholder="Votre téléphone">
    </div>
    <div>
        <label for="input_message">Votre message</label>
        <textarea name="message" id="input_message" placeholder="Votre message"></textarea>
    </div>

    <!--  Editing the sending button  -->
    <x-slot name="button_slot">
        <a href="#" class="link">ENVOYER</a>
    </x-slot>
</x-airdev-contact::form>
```
#### You can add custom classes to ``<form>`` and ``<button>``
You'll find these settings into the published config file ``config/contact.php``
```php
/* config/contact.php */

return [
    // Class to apply on the submit button (by default, Bootstrap 5 btn classes are used)
    'submit-btn-class' => 'btn btn-primary',
    // Class to apply on <form>
    'form-class' => ''
];
```
## Optional customization 
These other customization are not required for the good work of this library.
### Publish mail view
If you want to edit the mail that is sent, you can publish the view file. This is often the case when you have more fields than the basic ones in the library. 
```shell
php artisan vendor:publish --tag=airdev-contact-mail-view
```
You can now modify the view in the following file :
```
resources/views/vendor/airdev/contact/mails/mail.blade.php
```