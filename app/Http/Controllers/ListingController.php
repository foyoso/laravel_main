<?php

namespace App\Http\Controllers;
class ListingController extends BaseController
{
    public function index()
    {
      return view($this -> layoutDir.'.listing.index', [
        'title' => 'Listing'
      ]);
    }
}