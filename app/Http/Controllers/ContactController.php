<?php

namespace App\Http\Controllers;
class ContactController extends BaseController
{
    public function index()
    {
      return view($this -> layoutDir.'.contact.index', [
        'title' => 'Contact'
      ]);
    }
}