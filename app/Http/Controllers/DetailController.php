<?php

namespace App\Http\Controllers;
class DetailController extends BaseController
{
    public function index()
    {
      return view($this -> layoutDir.'.detail.index', [
        'title' => 'Detail'
      ]);
    }
}