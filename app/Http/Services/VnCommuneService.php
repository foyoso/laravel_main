<?php
namespace App\Http\Services;

use App\Models\VnCommune;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class VnCommuneService
{
  public function create($commune)
    {
        DB::beginTransaction();
        try {
          VnCommune::create([
              'name'       => $commune['name'],
              'idDistrict' => $commune['idDistrict'],
              'idCommune'  => $commune['idCommune'],
          ]);
          DB::commit();
          Session::flash('success', 'Create commune success');
          return true;
        } catch (\Exception $err) {
          DB::rollBack();
          Session::flash('error', $err->getMessage());
          return false;
        }
    }
}