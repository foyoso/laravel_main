<?php

namespace App\Http\Controllers;

use App\Http\Services\ListingService;
use App\Http\Services\PostService;
use App\Http\Services\WebsiteService;

class IndexController extends BaseController
{
    public function index()
    {
      $post = new PostService();
      $listing = new ListingService();
      return view($this -> layoutDir.'.index', [
        'title' => 'Home',
        'posts' => $post -> getByIdsOrderById($this -> website -> home_posts),
        'listings' => $listing -> getByIdsOrderById($this -> website -> home_listings),
      ]);
    }

    public function estate3()
    {
      return view('client.estate3.index', [
        'title' => 'Home'
      ]);
    }
}