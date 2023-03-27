<?php
namespace App\Http\Services;

use App\Models\VnProvince;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class VnProvinceService
{
  public function create($province)
    {
        DB::beginTransaction();
        try {
          VnProvince::create([
              'name'       => $province['name'],
              'idProvince' => $province['idProvince'],
          ]);
          DB::commit();
          Session::flash('success', 'Create Province success');
          return true;
        } catch (\Exception $err) {
          DB::rollBack();
          Session::flash('error', $err->getMessage());
          return false;
        }
    }
}