<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmailSent;
use App\Email;


class DispatchEmailCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Dispatch Email Sending Job';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
          $mailsToSend = Email::where('is_send', '=', false)->get();
            try {
                foreach ($mailsToSend as $emailObj) {
                    
                    Mail::to($emailObj->email)
                        ->send(new EmailSent($emailObj));
                        $emailObj->is_send=true;
                        $emailObj->save();
                }
            } catch (Exception $e) {
                //Log this Messagess.....
                echo $e->getMessage();
            }
    }
}
