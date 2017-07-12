<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;

use App\Mail\EmailSent;
use App\Email;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $mailsToSend=Email::where('is_send', '=', false)->get();
        try {
            foreach ($mailsToSend as $emailObj) {

                 Mail::to($emailObj)
                ->send(new EmailSent($email));


            }
        } catch (Exception $e) {
            //Log this Messagess.....
            echo $e->getMessage();
        }
    }
}
