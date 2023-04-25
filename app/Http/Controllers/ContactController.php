<?php

namespace App\Http\Controllers;

use App\Http\Services\ContactService;
use App\Http\Services\EmailService;
use App\Http\Services\PageService;
use Illuminate\Http\Request;
class ContactController extends BaseController
{
    public function index()
    {
      $page = new PageService();
      $page = $page ->findBySlug($this -> website -> id, LINK_CONTACT);
      if($page){
      $this -> setMetaTag($page -> description,
                          $this -> website-> getDomain(1). $page -> slug,
                          $page -> og_image, $page -> keyword,
                          $page -> title);
      }
      return view($this -> layoutDir.'.contact.index', [
        'title' => 'Contact',
        'page' => $page,
      ]);
    }
    public function save(Request $request) {
      $emailService = new EmailService();
      $contactService = new ContactService();
      // if($this -> website -> use_standard_captcha){
      //     if($request -> captcha_input != session()->get('captcha_code')){
      //         return response()->json(['status' => false,
      //         'message' => 'Confirmation code is not correct.', 'c' => session()->get('captcha_code')]);
      //     }
      // }
      //$recaptcha = new ReCaptchaGoogle();

      // if($this -> website -> use_captcha_google){
      // if($recaptcha -> checkCaptCha($request->input("g-recaptcha-response"),   $this -> website -> setting) == false){
      //     return response()->json(['status' => false,
      //         'message' => 'Google captcha code is not correct.']);
      // }}
      $result = $contactService -> create($request, $this -> website -> id);
      if( $result['status'] ){
          $emailService -> pageContact($result['contact'], $this -> website);
          unset($result['contact']);
      }
      return response()->json($result);
  }
}