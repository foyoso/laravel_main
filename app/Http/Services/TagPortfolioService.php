<?php
namespace App\Http\Services;



use App\Models\TagPortfolio;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class TagPortfolioService
{

    public function getAll($limit = 0, $request)
    {
        $qr = TagPortfolio::query();
        if($request -> has('name') ){
            $qr -> where('name', 'like', '%' . $request -> input('name').'%' );
        }
        return $qr -> orderbyDesc('updated_at')->paginate($limit)->withQueryString();;
    }
    public function getByUser($userId,  $request)
    {
        $qr = TagPortfolio::query();
        if($request -> has('name') ){
            $qr -> where('name', 'like', '%' . $request -> input('name').'%' );
        }
        return $qr -> where('user_id', $userId) -> orderbyDesc('updated_at') -> get();
    }

    public function getByWebsite($webId,  $request)
    {
        $qr = TagPortfolio::query();
        if($request -> has('name') ){
            $qr -> where('name', 'like', '%' . $request -> input('name').'%' );
        }
        return $qr -> where('website_id', $webId) -> orderbyDesc('updated_at') -> get();
    }


    public function getAllForSelectBox($userId){
        return TagPortfolio::where('user_id', $userId) -> select('id','name') -> orderbyDesc('updated_at')->get();
    }
    public function create($request)
    {
        DB::beginTransaction();
        try {
            $listing = TagPortfolio::create([
                'name'       => (string)$request->input('name'),
                'user_id'       => $request->input('user_id'),
                'slug' => (string)Str::slug($request->input('name'), '-'),
                'website_id' => $request->input('website_id'),
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
            $post = TagPortfolio::where('id', $id)->first();
            if ($post) {
                 TagPortfolio::where('id', $id)->delete();
                 return true;
            }
        } catch (\Exception $err) {
            return false;
        }
    }


}