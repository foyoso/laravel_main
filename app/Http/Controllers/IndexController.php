<?php

namespace App\Http\Controllers;
class IndexController extends BaseController
{
    public function index()
    {
      return view($this -> layoutDir.'.index', [
        'title' => 'Home'
      ]);
    }

    public function estate3()
    {
      return view('client.estate3.index', [
        'title' => 'Home'
      ]);
    }
}