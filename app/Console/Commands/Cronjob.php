<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Mail\CronMail;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class Cronjob extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'demo:cronejob';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cron job demo';

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
     * @return int
     */
    public function handle()
    {
        //first way
        try{
            Mail::raw('Text to e-mail', function($message)
            {
                $message->to('xyz@gmail.com');
            });
        Log::info('cronjob sent');
        }
        catch(\Throwable $t){
            Log::error($t);
        }

        //second way
        // try{
        //     Mail::to('xyz@gmail.com')->send(new CronMail('demo'),['message' => 'This is demo'],function($message){
        //         $message->subject('varification');
        //     });
        //     Log::info('cronjob sent');
        // }
        // catch(\Trowable $t)
        // {
        //     Log::error($t);
        // }  

        //third way
        // Mail::to('abc@gmail.com')->send(new CronMail('demo'));
    }
}
