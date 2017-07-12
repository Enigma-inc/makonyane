<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Mail;
use App\Email;
use App\Mail\EmailSent;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
          

            $mailsToSend=Email::where('is_send', '=', false)->get();
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
        })->everyMinute();
    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        require base_path('routes/console.php');
    }
}
