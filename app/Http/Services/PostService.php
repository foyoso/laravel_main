<?php
namespace App\Http\Services;

use App\AppConst;
use App\Models\Post;
use App\Utils\WebConst;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use MyApp\Model\Posts;

class PostService
{

    public function getAll($limit = 0, $request)
    {
        $qr = Post::query();
        if($request -> has('name') ){
            $qr -> where('name', 'like', '%' . $request -> input('name').'%' );
        }
        return $qr -> orderbyDesc('updated_at')->paginate($limit)->withQueryString();
    }
    public function search($limit = 0, $request, $userId)
    {
        $qr = Post::query();
        $limit = $request-> has('limit') && $request -> limit >0 ? $request -> limit : $limit;
        if($request -> has('name') ){
            $qr -> where('name', 'like', '%' . $request -> input('name').'%' );
        }
        return $qr -> where('user_id', $userId) -> orderbyDesc('updated_at')->paginate($limit)->withQueryString();
    }
    public function getByUser($limit = 0, $request, $userId)
    {
        $qr = Post::query();
        if($request -> has('name') ){
            $qr -> where('name', 'like', '%' . $request -> input('name').'%' );
        }
        if($limit >0){
            return $qr -> where('user_id', $userId) ->
            orderbyDesc('updated_at')->paginate($limit) -> withQueryString();
        } else {
            return $qr -> where('user_id', $userId) -> orderbyDesc('updated_at') ->get();
        }

    }
    public function getAllForSelectBox(){
        return Post::select('id','name')->orderbyDesc('id')->get();
    }
    public function create($request, $website)
    {
        DB::beginTransaction();
        try {
            $listing = Post::create([
                'name'       => (string)$request->input('name'),
                'user_id'       => $website ->user_id,
                'website_id'       => $website ->id,
                'slug' => (string)Str::slug($request->input('name'), '-'),
                'description' =>  $request->input('description'),
                'publish_at' =>  $request->input('publish_at'),
                'tags' =>  $request->input('tags'),

            ]);
            DB::commit();
            Session::flash('success', 'Create Post success');
            return true;
        } catch (\Exception $err) {
            DB::rollBack();
            Session::flash('error', $err->getMessage());
            return false;
        }
    }

    public function edit($request, $post)
    {
        DB::beginTransaction();
        try {
            $post -> name       = (string)$request->input('name');
            $post -> slug = (string)Str::slug($request->input('name'), '-');
            $post -> thumbnail =  $request->input('thumbnail');
            $post -> publish_at=  $request->input('publish_at');
            $post -> content=  $request->input('content');
            $post -> description =  $request->input('description');
            $post -> tags =  $request->input('tags');
            $post->save();
            DB::commit();
            Session::flash('success', 'Edit Post success');
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
            $post = Post::where('id', $id)->first();
            if ($post) {
                 Post::where('id', $id)->delete();
                 return ['status'=>true];
            }
        } catch (\Exception $err) {
            return ['status'=>false];
        }
    }


    public function getId($id)
    {
        return Post::where('id', $id)->firstOrFail();
    }
    public function getArrayData() {
        $arr = array();
        $categories = Post::orderbyDesc('id')->get();
        foreach($categories as $item) {
            array_push($arr, array('id' => $item -> id, 'name' => $item -> name, 'parent_id' => $item -> district_id ,'slug' => $item -> slug));
        }
        return $arr;
    }
    public function getByIds($request)
    {
        $limit = WebConst::ITEM_PER_PAGE;
        if($request->has('limit')){
            $limit = $request -> input('limit');
        }

        $ids = $request ->input('ids');
        if($ids == '') return [];
        if($request->has('admin')){
            return Post::
            whereIn('id', explode(',', $ids))
            ->orderbyDesc('updated_at')->get();
        }
        return Post::
            whereIn('id', explode(',', $ids))
            ->orderbyDesc('updated_at')->paginate($limit)->withQueryString();

    }
    public function getByIdsOrderById($ids)
    {

        if($ids == '') return [];
        return Post::
            whereIn('id', explode(',', $ids))
            ->orderByRaw("FIELD(id , ".$ids.")")-> get();
    }

    public function createRender($index)
    {
        DB::beginTransaction();
        try {
            Post::create([
                'name'       => 'post '.$index,
                'user_id'       => 2,
                'website_id'       => 5,
                'slug' => 'post-'.$index,
                'description' =>  'post '.$index
            ]);
            DB::commit();
            Session::flash('success', 'Create Post success');
            return true;
        } catch (\Exception $err) {
            DB::rollBack();
            Session::flash('error', $err->getMessage());
            return false;
        }
    }

    public function findBySlug($slug) {
        $post = new Post();
        return $post->findBySlug($slug);
    }

}