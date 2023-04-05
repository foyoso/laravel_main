<?php

namespace App\Http\Controllers;

use App\Http\Services\ListingService;
use App\Http\Services\PageService;
use Illuminate\Http\Request;

class ListingController extends BaseController
{
    public function index(Request $request)
    {
      $page = new PageService();
      $page = $page ->findBySlug($this -> website -> id, LINK_LISTINGS);
      if($page){
      $this -> setMetaTag($page -> description,
                          $this -> website-> getDomain(1). $page -> slug,
                          $page -> og_image, $page -> keyword,
                          $page -> title);
      }
      $listingService = new ListingService();
      $data = $listingService -> getAll(POST_ITEM_PER_PAGE, $request);

      return view($this -> layoutDir.'.listing.index', [
        'title' => 'Listing',
        'listings' => $data
      ]);
    }
}