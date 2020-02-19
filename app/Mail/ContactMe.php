<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMe extends Mailable
{
    use Queueable, SerializesModels;

    public $sujet;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($sujet)
    {
        //
        $this->sujet = $sujet;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.contact-me')
                    ->subject('Un email sur '.$this->sujet);
    }
}
