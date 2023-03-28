<?php

namespace App\Http\Controllers;

use App\Http\Services\PostService;
use App\Http\Services\VnCommuneService;
use App\Http\Services\VnDistrictService;
use App\Http\Services\VnProvinceService;

class RenderController extends BaseController
{
    protected $provinceService;
    protected $districtService;
    protected $communeService;
    public function __construct(VnProvinceService $provinceService, VnDistrictService $districtService, VnCommuneService $communeService)
    {
        $this->provinceService = $provinceService;
        $this->districtService = $districtService;
        $this->communeService  = $communeService;
    }

    public function index()
    {
      $data = json_decode(file_get_contents(storage_path() . "/vietnam/db.json"), true);
      echo "<pre>";
      print_r($data['province']);
      return;

      foreach($data['province'] as $province) {
        $this->provinceService->create($province);
      }

      return;
    }

    public function district()
    {
      $data = json_decode(file_get_contents(storage_path() . "/vietnam/db.json"), true);
      echo "<pre>";
      print_r($data['district']);
      return;

      foreach($data['district'] as $district) {
        $this->districtService->create($district);
      }

      return;
    }

    public function commune()
    {
      $data = json_decode(file_get_contents(storage_path() . "/vietnam/db.json"), true);
      echo "<pre>";
      print_r($data['commune']);
      return;

      foreach($data['commune'] as $commune) {
        $this->communeService->create($commune);
      }

      return;
    }

    public function post()
    {
      return;

      $postService = new PostService();

      for ($i=1; $i < 100; $i++) { 
        $postService->createRender($i);
      }

      return;
    }
}