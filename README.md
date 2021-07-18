# Airdev/contact
A package that quickly provide contact form & email send features.

It's only working with Airdev web base project.

## Usage
### Installation
```shell
composer require airdev/contact
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
```

### Call the blade component into your view
```blade
<x-airdev-contact::form></x-airdev-contact::form>
```
### Routing
Be sure that the route ``POST /contact`` is free to use.

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