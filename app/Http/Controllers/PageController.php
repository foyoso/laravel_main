<?php

namespace App\Http\Controllers;

use App\Http\Services\ListingService;
use App\Http\Services\PageService;
use App\Http\Services\PostService;
use App\Http\Services\WebsiteService;

class PageController extends BaseController
{
    public function index($slug)
    {
      $page = new PageService();
      $page = $page ->findBySlug($this -> website -> id, '/'.$slug);
      if($page){
      $this -> setMetaTag($page -> description,
                          $this -> website-> getDomain(1),
                          $page -> og_image,
                          $page -> keyword,
                          $page -> title);
      }
      return view($this -> layoutDir.'.page.index', [
        'title' => $page -> title,
         'data' => $page
      ]);
    }

    public function estate3()
    {
      return view('client.estate3.index', [
        'title' => 'Home'
      ]);
    }
}