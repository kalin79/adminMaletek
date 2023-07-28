<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendCotizaciones extends Mailable
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
        $subject = 'Cotización Maletek';
        $name = "Cotización Maletek";

        return $this->view('emails.cotizaciones')
            ->from($address, $name)
            ->subject($subject)
            ->with([ 'data' => $this->data ]);
    }
}
