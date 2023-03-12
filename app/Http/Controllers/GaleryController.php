<?php

namespace App\Http\Controllers;
class GaleryController extends BaseController
{
    public function index()
    {
      return view($this -> layoutDir.'.galery.index', [
        'title' => 'Galery'
      ]);
    }
}