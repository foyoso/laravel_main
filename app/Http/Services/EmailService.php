<?php
namespace App\Http\Services;
use App\Jobs\SendEmail;
class EmailService
{

     public function pageContact($contact, $website){
        $subject = 'New Enquiry from '.$contact -> name . '('.$contact -> phone.') for '.$website -> name;
        $cc = [];
        if($website -> email2 != ''){
            $cc[] = $website -> email2;
        }
        if($website -> email3 != ''){
            $cc[] = $website -> email3;
        }
        SendEmail::dispatch(
                $website -> email,
                [   'contact'=> $contact,
                    'subject' => $subject ],
                $subject,
                'mail.page-contact',
                $cc
            )
        ->delay(now()->addMinute(1));
     }


}