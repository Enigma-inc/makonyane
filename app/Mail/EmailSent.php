<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailSent extends Mailable
{
    use Queueable, SerializesModels;

    public $email;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct( $email)
    {
        $this->email=$email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('info@nulistice.org.ls','NULISTICE 2018')
                    ->subject($this->email->subject)
                    ->text('emails.email-sent')
                    ->attach(public_path()."/email-docs/".$this->email->doc_path);
    }
}
