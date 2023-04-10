<?php
namespace App\Http\Services;

use App\AppConst;
use App\Models\Listing;
use App\Utils\WebConst;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
class ListingService
{

    public function getAll($limit = 0, $request)
    {
        $qr = Listing::query();
        if($request -> has('name') ){
            $qr -> where('name', 'like', '%' . $request -> input('name').'%' );
        }
        return $qr -> orderbyDesc('updated_at')->paginate($limit)->withQueryString();;
    }

    public function getByUser($limit = 0, $request, $userId)
    {

        $qr = Listing::query();
        if($request -> has('name') ){
            $qr -> where('name', 'like', '%' . $request -> input('name').'%' );
        }
        if($limit > 0){
            return $qr -> where('user_id', $userId)->
            orderbyDesc('updated_at')->paginate($limit)->withQueryString();
        } else {
            return $qr -> where('user_id', $userId)->
                orderbyDesc('updated_at')->get();
        }

    }
    public function getAllForSelectBox(){
        return Listing::select('id','name')->orderbyDesc('id')->get();
    }
    public function create($request, $website)
    {
        DB::beginTransaction();
        try {
            $listing = Listing::create([
                'name'       => (string)$request->input('name'),
                'slug' => (string)Str::slug($request->input('name'), '-'),
                'thumbnail' =>  $request->input('thumbnail'),
                'images'=>  $request->input('images'),
                'address'=>  $request->input('address'),
                'commune' => $request->input('commune'),
                'district'=> $request->input('district'),
                'province'=> $request->input('province'),
                'price'=> $request->input('price'),
                // 'description'=> $request->input('description'),
                // 'sale_or_rent'=> $request->input('sale_or_rent'),
                // 'bedroom'=> $request->input('bedroom'),
                // 'bathroom'=> $request->input('bathroom'),
                'area'=> $request->input('area'),
                'user_id'=>  $website ->user_id ,
                'website_id'=> $website ->id,
                'tags'=> $request->input('tags'),
            ]);
            DB::commit();
            Session::flash('success', 'Create listing success');
            return $listing;
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            DB::rollBack();
            return false;
        }
    }

    public function edit($request, $listing)
    {
        DB::beginTransaction();
        try {
            $listing -> name       = (string)$request->input('name');

            $listing -> slug = (string)Str::slug($request->input('name'), '-');
            $listing ->thumbnail =  $request->input('thumbnail');

            $listing ->address=  $request->input('address');

            $listing ->commune=  $request->input('commune');
            $listing ->district=  $request->input('district');
            $listing ->province= $request->input('province');

            $listing ->price= str_replace(',', '', $request->input('price'));
            $listing ->description= $request->input('description');
            $listing ->sale_or_rent= $request->input('sale_or_rent');
            $listing ->bedroom= $request->input('bedroom');
            $listing ->bathroom=$request->input('bathroom');
            $listing ->area = str_replace(',', '', $request->input('area'));

            $listing ->tags= $request->input('tags');


            $images=  $request->input('image_slides');
            if ($images != "") {
                $listing -> images = implode(',', $images);
            }
            $listing->save();
            DB::commit();
            Session::flash('success', 'Edit listing success');
            return ['status'=>true, 'data'=> $listing];
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            DB::rollBack();
            return ['status'=>false, 'message'=> $err->getMessage()];
        }

    }

    public function delete($request)
    {
        try{
            $id = (int)$request->input('id');
            $post = Listing::where('id', $id)->first();
            if ($post) {
                 Listing::where('id', $id)->delete();
                 return ['status'=>true];
            }
        } catch (\Exception $err) {
            return ['status'=>false];
        }
    }


    public function getId($id)
    {
        return Listing::where('id', $id)->firstOrFail();
    }
    public function getArrayData() {
        $arr = array();
        $categories = Listing::orderbyDesc('id')->get();
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
            return Listing::
            whereIn('id', explode(',', $ids))
            ->orderbyDesc('updated_at')->get();
        }
        return Listing::
            whereIn('id', explode(',', $ids))
            ->orderbyDesc('updated_at')->paginate($limit)->withQueryString();
    }
    public function getByIdsOrderById($ids)
    {

        if($ids == '') return [];
        return Listing::
            whereIn('id', explode(',', $ids))
            ->orderByRaw("FIELD(id , ".$ids.")")-> get();
    }

    public function findBySlug($slug) {
        $listing = new Listing();
        return $listing->findBySlug($slug);
    }

}