<?php

namespace Airdev\Contact\App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct($request)
    {
        $this->data = $request;
    }

    public function build()
    {
        return $this->from($this->data->email)
            ->subject(config('contact.mail_subject', 'Sujet non défini'))
            ->view('contact::mails.mail');
    }
}
