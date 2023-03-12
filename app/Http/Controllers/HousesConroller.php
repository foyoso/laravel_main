<?php

namespace App\Http\Controllers;
class HousesConroller extends BaseController
{
    public function index()
    {
      return view($this -> layoutDir.'.houses.index', [
        'title' => 'Houses'
      ]);
    }
}