<?php
namespace App\Http\Services;
use App\Models\Bathroom;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
class BathroomService
{



    public function getAll($limit = 0, $request)
    {
        $userLogin = $request ->input('userLogin');
        $request->request->remove('userLogin');
        if($limit == 0 ){
            return Bathroom::orderbyDesc('id')->get();
        }
        return Bathroom::orderbyDesc('id')->paginate($limit)->withQueryString();;
    }
    public function getAllForSelectBox(){
        return Bathroom::select('id','name')->orderbyDesc('id')->get();
    }
    public function create($request)
    {
        DB::beginTransaction();
        try {
            $country  = Bathroom::create([
                'name'     => (string)$request->input('name'),

            ]);

            DB::commit();
            Session::flash('success', 'Create Bathroom success');
            return true;
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            DB::rollBack();
            return false;
        }
    }

    public function edit($request, $bathroom ): bool
    {
        DB::beginTransaction();
        try {
            $bathroom ->name = (string)$request->input('name');

            $bathroom ->save();
            DB::commit();
            Session::flash('success', 'Edit Bathroom success');
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            DB::rollBack();
            return false;
        }
        return true;
    }

    public function delete($request)
    {
        try{
            $id = (int)$request->input('id');
            $post = Bathroom::where('id', $id)->first();
            if ($post) {
                return Bathroom::where('id', $id)->delete();
            }
        } catch (\Exception $err) {
            return false;
        }
        return false;
    }


    public function getId($id)
    {
        return Bathroom::where('id', $id)->firstOrFail();
    }
}