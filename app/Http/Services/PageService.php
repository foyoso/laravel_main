<?php
namespace App\Http\Services;
use App\Models\Page;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
class PageService
{

    public function getAll( $webId, $isDefaut = 0)
    {
        return Page::
        where('website_id', $webId)
        -> where('page_default', $isDefaut)
        -> orderbyDesc('updated_at') -> get();
    }
    public function findBySlug($webId, $slug)
    {
        return Page:: where([['website_id','=', $webId], ['slug', '=', $slug]])->first();
    }
    public function getAllForSelectBox($webId){
        return Page::select('id','name', 'slug')
        ->where('website_id', $webId)
        ->orderbyDesc('id')->get();
    }
    public function create($request, $webId)
    {

        DB::beginTransaction();
        try {
             Page::create([
                'name'       => $request->input('name'),
                'banner_type' => $request->input('banner_type'),
                'title'=> $request->input('title'),
                'banner_title'=> $request->input('banner_title'),
                'description'=> $request->input('description'),
                'banner_description'=> $request->input('banner_description'),
                'slug'=> '/' . Str::slug($request->input('name'), '-'),
                'image_banner'=> $request->input('image_banner'),
                'og_image'=> $request->input('og_image'),
                'page_default'=> 0,
                'html_content'=> $request->input('html_content'),
                'keyword'=> $request->input('keyword'),
                'status'=> $request->input('status'),
                'review'=> $request->input('review'),
                'rating'=> $request->input('rating'),
                'form_status'=> empty($request->input('form_status'))? 0 : 1,
                'is_home_page'=> 0,
                'website_id'=> $webId,

            ]);

            DB::commit();
            Session::flash('success', 'Create Page success');
            return true;
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            DB::rollBack();
            return false;
        }
    }

    public function createDefaultPages($webId, $userId){
            $this -> createDefaultPage($webId, $userId,  'Home', LINK_HOME, 1);
            $this -> createDefaultPage($webId, $userId,  'News', LINK_BLOG, 0);
            $this -> createDefaultPage($webId, $userId,  'Listings', LINK_LISTINGS, 0);
            $this -> createDefaultPage($webId, $userId,  'Contact', LINK_CONTACT, 0);
    }
    public function createDefaultPage($webId, $userId, $name, $slug, $is_home_page)
    {
        DB::beginTransaction();
        try {
             Page::create([
                'name'        => $name,
                'title'       => $name,
                'slug'        => $slug,
                'page_default'=> 1,
                'is_home_page'=> $is_home_page ,
                'user_id'     => $userId,
                'website_id'  => $webId,
            ]);
            DB::commit();
            Session::flash('success', 'Create Page success');
            return true;
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            DB::rollBack();
            return false;
        }
    }

    public function edit($request, $page): bool
    {
        DB::beginTransaction();
        try {

            $page ->name =  $request->input('name');
            $page ->banner_type =  $request->input('banner_type');
            $page ->title =  $request->input('title');
            $page ->banner_title =  $request->input('banner_title');
            $page ->description =  $request->input('description');
            $page ->banner_description =  $request->input('banner_description');
            $page ->image_banner =  $request->input('image_banner');
            $page ->og_image =  $request->input('og_image');
            $page ->html_content =  $request->input('html_content');
            $page ->keyword =  $request->input('keyword');
            $page ->status =  $request->input('status');
            $page ->review =  $request->input('review');
            $page ->rating =  $request->input('rating');
            $page ->keyword = $request->input('keyword');
            $images=  $request->input('image_slides');
            if ($images != "") {
                $page -> image_slider = implode(',', $images);
            } else {
                $page ->image_slider = '';
            }
            $page->save();

            DB::commit();
            Session::flash('success', 'Edit Page success');
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
            $post = Page::where('id', $id)->first();
            if ($post) {
                return Page::where('id', $id)->delete();
            }
        } catch (\Exception $err) {
            return false;
        }
        return false;
    }


}