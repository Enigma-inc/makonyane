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
    protected $appends=['send_count','queue_count'];

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($emailObj)
    {
        $this->emailObj = $emailObj;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('info@nulistice.org.ls','NULISTICE 2018')
                    ->subject($this->emailObj->subject)
                    ->text('emails.email-sent')
                    ->attach(public_path()."/email-docs/".$this->emailObj->doc_path);
    }
}
