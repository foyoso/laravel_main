<?php
namespace App\Http\Services;
use App\Models\Bedroom;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
class BedroomService
{


    public function getAll($limit = 0, $request)
    {
        $userLogin = $request ->input('userLogin');
        $request->request->remove('userLogin');
        if($limit == 0 ){
            return Bedroom::orderbyDesc('id')->get();
        }
        return Bedroom::orderbyDesc('id')->paginate($limit)->withQueryString();;
    }
    public function getAllForSelectBox(){
        return Bedroom::select('id','name')->orderbyDesc('id')->get();
    }
    public function create($request)
    {
        DB::beginTransaction();
        try {
            $bedroom  = Bedroom::create([
                'name'     => (string)$request->input('name'),

            ]);

            DB::commit();
            Session::flash('success', 'Create Bedroom success');
            return true;
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            DB::rollBack();
            return false;
        }
    }

    public function edit($request, $bedroom ): bool
    {
        DB::beginTransaction();
        try {
            $bedroom ->name = (string)$request->input('name');

            $bedroom ->save();
            DB::commit();
            Session::flash('success', 'Edit bedroom success');
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
            $post = Bedroom::where('id', $id)->first();
            if ($post) {
                return Bedroom::where('id', $id)->delete();
            }
        } catch (\Exception $err) {
            return false;
        }
        return false;
    }


    public function getId($id)
    {
        return Bedroom::where('id', $id)->firstOrFail();
    }
}