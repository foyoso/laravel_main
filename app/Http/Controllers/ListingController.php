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

    public function detail(string $slug)
    {
      $listingService = new ListingService();
      $data = $listingService->findBySlug($slug);
      if (!$data) {
        return response()->view($this -> layoutDir.'.errors.404', ['error' => 'Not Found'], 404);
      }
      return view($this -> layoutDir.'.listing.detail', [
        'title' => 'Detail',
        'data' => $data
      ]);
    }
}