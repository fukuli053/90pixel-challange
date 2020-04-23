<?php

namespace App\Jobs;

use App\Mail\ProblemMail;
use Illuminate\Bus\Queueable;
use App\Mail\SendMailMailable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    private $error;

    /**
     * Create a new job instance.
     *
     * @param $error
     */
    public function __construct($error = false)
    {
        $this->error = $error;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if ($this->error){
            Mail::to("buradayim@90pixel.com")->send(new ProblemMail());
        }else{
            Mail::to("buradayim@90pixel.com")->send(new SendMailMailable());
        }
    }
}
