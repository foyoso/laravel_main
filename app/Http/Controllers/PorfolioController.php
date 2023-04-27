<?php

namespace App\Http\Controllers;

use App\Http\Services\PortfolioService;

class PorfolioController extends BaseController
{
    public function index()
    {
      $port = new PortfolioService();
      // $port = $port ->findBySlug($this -> website -> id, '/porfolio');
      // if($port){
      // $this -> setMetaTag($port -> description,
      //                     $this -> website-> getDomain(1),
      //                     $port -> og_image,
      //                     $port -> keyword,
      //                     $port -> title);
      // }
      return view($this -> layoutDir.'.porfolio.index', [
        'title' => 'Porfolio',
        'data' => $port
      ]);
    }

    public function detail()
    {
      $port = new PortfolioService();
      // $port = $port ->findBySlug($this -> website -> id, '/porfolio');
      // if($port){
      // $this -> setMetaTag($port -> description,
      //                     $this -> website-> getDomain(1),
      //                     $port -> og_image,
      //                     $port -> keyword,
      //                     $port -> title);
      // }
      return view($this -> layoutDir.'.porfolio.detail', [
        'title' => 'Porfolio',
        'data' => $port
      ]);
    }
}