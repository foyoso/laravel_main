<?php
namespace App\Http\Services;

use App\Models\VnDistrict;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class VnDistrictService
{
  public function create($district)
    {
        DB::beginTransaction();
        try {
          VnDistrict::create([
              'name'       => $district['name'],
              'idDistrict' => $district['idDistrict'],
              'idProvince'  => $district['idProvince'],
          ]);
          DB::commit();
          Session::flash('success', 'Create district success');
          return true;
        } catch (\Exception $err) {
          DB::rollBack();
          Session::flash('error', $err->getMessage());
          return false;
        }
    }
    public function getByProvince($id){
      return VnDistrict::select('id','name','idDistrict') -> where('idProvince', $id)-> get();
    }
}