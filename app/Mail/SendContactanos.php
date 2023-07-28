<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendContactanos extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
    {
        $address = 'infodev@codegraph.pe';
        $subject = 'Contactanos';
        $name = "Maletek";

        return $this->view('emails.contactenos')
            ->from($address, $name)
            ->subject($subject)
            ->with([ 'data' => $this->data ]);
    }
}
