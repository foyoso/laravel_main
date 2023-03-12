<?php

namespace App\Http\Controllers;
class RoomsConroller extends BaseController
{
    public function index()
    {
      return view($this -> layoutDir.'.rooms.index', [
        'title' => 'Rooms'
      ]);
    }
}