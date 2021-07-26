<?php

namespace Airdev\Contact\App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $mail_config;

    public function __construct($request, $mail_config)
    {
        $this->data = $request;
        $this->mail_config = $mail_config;
    }

    public function build()
    {
        return $this
            ->from(env('MAIL_FROM_ADDRESS', 'info@airdev.be'), env('MAIL_FROM_NAME', 'Romain Vause'))
            ->replyTo($this->data->email)
            ->subject($this->mail_config['mail_subject'])
            ->view('contact::mails.mail');
    }
}
