<?php

namespace App\Http\Controllers;

use App\Http\Services\ListingService;
use App\Http\Services\PageService;
use App\Http\Services\PostService;
use App\Http\Services\WebsiteService;

class IndexController extends BaseController
{
    public function index()
    {
      $post = new PostService();
      $listing = new ListingService();
      $page = new PageService();
      $page = $page ->findBySlug($this -> website -> id, LINK_HOME);
      if($page){
      $this -> setMetaTag($page -> description,
                          $this -> website-> getDomain(1),
                          $page -> og_image, $page -> keyword,
                          $page -> title);
      }
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