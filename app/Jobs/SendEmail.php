<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Mail;
use App\Mail\MailNotify;
class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    protected $data;
    protected $subject;
    protected $viewPath;
    protected $emailTo;
    protected $cc;

    /**
     * Create a new job instance.
     *
     * @param $data
     */
    public function __construct($emailTo, $data, $subject, $viewPath, $cc = [])
    {
        $this->data = $data;
        $this->subject = $subject;
        $this->viewPath = $viewPath;
        $this->emailTo = $emailTo;
        $this -> cc = $cc;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if(count($this -> cc) == 0){
            Mail::to($this->emailTo)->send(new MailNotify($this->data, $this -> subject, $this -> viewPath));
        } else {
            Mail::to($this->emailTo) -> cc($this -> cc)->send(new MailNotify($this->data, $this -> subject, $this -> viewPath));
        }

    }
}
