<?php
namespace App\Http\Services;


use App\Models\Tag;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class TagService
{

    public function getAll($limit = 0, $request)
    {
        $qr = Tag::query();
        if($request -> has('name') ){
            $qr -> where('name', 'like', '%' . $request -> input('name').'%' );
        }
        return $qr -> orderbyDesc('updated_at')->paginate($limit)->withQueryString();;
    }
    public function getByUser($userId,  $request)
    {
        $qr = Tag::query();
        if($request -> has('name') ){
            $qr -> where('name', 'like', '%' . $request -> input('name').'%' );
        }
        return $qr -> where('user_id', $userId) -> orderbyDesc('updated_at') -> get();
    }


    public function getAllForSelectBox($userId){
        return Tag::where('user_id', $userId) -> select('id','name') -> orderbyDesc('updated_at')->get();
    }
    public function create($request)
    {
        DB::beginTransaction();
        try {
            $listing = Tag::create([
                'name'       => (string)$request->input('name'),
                'user_id'       => $request->input('user_id'),
                'slug' => (string)Str::slug($request->input('name'), '-'),
            ]);
            DB::commit();
            Session::flash('success', 'Create Tag success');
            return true;
        } catch (\Exception $err) {
            DB::rollBack();
            Session::flash('error', $err->getMessage());
             return false;
        }
    }

    public function edit($tag, $request)
    {
        DB::beginTransaction();
        try {
            $tag -> name       = (string)$request->input('name');
            $tag -> slug = (string)Str::slug($request->input('name'), '-');
            $tag->save();
            DB::commit();
            Session::flash('success', 'Edit Tag success');
            return true;
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            DB::rollBack();
            return false;
        }

    }

    public function delete($request)
    {
        try{
            $id = (int)$request->input('id');
            $post = Tag::where('id', $id)->first();
            if ($post) {
                 Tag::where('id', $id)->delete();
                 return true;
            }
        } catch (\Exception $err) {
            return false;
        }
    }


}