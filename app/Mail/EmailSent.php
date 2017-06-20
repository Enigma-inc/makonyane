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
    public $user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $email)
    {
        $this->user=$user;
        $this->email=$email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->user->email)
                    ->subject($this->email->subject)
                    ->markdown('emails.email-sent')
                    ->text('emails.email-sent_plain');
    }
}
