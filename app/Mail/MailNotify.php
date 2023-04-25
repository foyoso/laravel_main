<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailNotify extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $subject;
    public $viewPath;
   /**
    * Create a new data instance.
    *
    * @return void
    */

   public function __construct($data, $subject, $viewPath)
   {
       $this->data = $data;
       $this->subject = $subject;
       $this->viewPath = $viewPath;
   }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this ->from(env("MAIL_FROM_ADDRESS"), 'Website system')
                     -> view($this->viewPath)
                     -> subject($this -> subject);
    }
}
