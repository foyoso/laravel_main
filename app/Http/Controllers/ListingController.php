<?php

namespace App\Http\Controllers;

use App\Http\Services\PageService;

class ListingController extends BaseController
{
    public function index()
    {
      $page = new PageService();
      $page = $page ->findBySlug($this -> website -> id, LINK_LISTINGS);
      if($page){
      $this -> setMetaTag($page -> description,
                          $this -> website-> getDomain(1). $page -> slug,
                          $page -> og_image, $page -> keyword,
                          $page -> title);
      }
      return view($this -> layoutDir.'.listing.index', [
        'title' => 'Listing'
      ]);
    }
}