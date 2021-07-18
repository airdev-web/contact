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
        return $this->from('info@airdev.be')
            ->subject(config('contact.mail_subject', 'Sujet non défini'))
            ->view('contact::mail');
    }
}
