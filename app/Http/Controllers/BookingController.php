<?php

namespace App\Http\Controllers;
class BookingController extends BaseController
{
    public function index()
    {
      return view($this -> layoutDir.'.booking.index', [
        'title' => 'Booking'
      ]);
    }
}