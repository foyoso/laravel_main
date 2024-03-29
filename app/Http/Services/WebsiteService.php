<?php
namespace App\Http\Services;
use App\Models\Website;
use App\Models\WebsiteSetting;
use App\Utils\CommonFunction;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
class WebsiteService
{
    public function findByDomain($domain)
    {
        $website = new Website();
        $result = $website -> findByDomain($domain);
        return $result;
    }
    public function search($limit = 0, $request)
    {
        $qr = Website::query();
        $limit = $request-> has('limit') && $request -> limit >0 ? $request -> limit : $limit;
        if($request -> has('name') && $request -> name!='' ){
            $qr -> where('name', 'like', '%' . $request -> input('name').'%' );
        }
        if($request -> has('layout_id') && $request -> layout_id!='' ){
            $qr -> where('layout_id', '=', $request -> layout_id );
        }
        if($request -> has('domain') && $request -> domain!='' ){
            $domain = str_replace('https://', '', $request -> input('domain'));
            $domain = str_replace('http://', '', $domain);
            $qr -> where('domain', 'like', '%' . $domain.'%' );
        }
        $data = $qr -> orderbyDesc('updated_at')->paginate($limit)->withQueryString();
        return $data;

    }
    public function getAll($limit = 0, $request)
    {
        return Website::orderbyDesc('updated_at')->paginate($limit)->withQueryString();
    }
    public function menu($request, $web){
        DB::beginTransaction();
        try {
            $type = $request->input('type');
            if($type == 0){
                $web->menu = $request->input('menu-data');
            } else {
                $web->menu_footer = $request->input('menu-data');
            }
            $web->save();
            DB::commit();
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            DB::rollBack();
            return false;
        }
        return true;
    }
    public function create($request)
    {
        $page = new PageService();
        DB::beginTransaction();
        try {
             $web = Website::create([
                'layout_id'     => (string)$request->input('layout_id'),
                'name'    => (string)$request->input('name'),
                'domain'    => (string)$request->input('domain'),
                'user_id'    => (string)$request->input('user_id'),
                'website_type_id'    =>  $request->input('website_type_id'),
            ]);

            DB::commit();
            Session::flash('success', 'Create Website success');
            if($web -> website_type_id == WEB_REAL_ESTATE){
                $page -> createDefaultPages3($web -> id, $web  -> user_id);
            } else if($web -> website_type_id == WEB_ECOMMERCE) {
                $page -> createDefaultPages2($web -> id, $web  -> user_id);
            } else if($web -> website_type_id == WEB_BUSINESS) {
                $page -> createDefaultPages1($web -> id, $web  -> user_id);
            }


            return true;
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            DB::rollBack();
            return false;
        }
    }

    public function edit($request, $website): bool
    {
        DB::beginTransaction();
        try {

            //ads
            $website->google_analytic = $request->input('google_analytic');
            $website->google_site_verification = $request->input('google_site_verification');
            $website->remarketing_tag = $request->input('remarketing_tag');
            $website->facebook_pixel_code = $request->input('facebook_pixel_code');

            //contact
            $website->phone = (string)$request->input('phone');
            $website->email = (string)$request->input('email');

            //domain
            $website->domain = (string)$request->input('domain');
            $website->protocol = (string)$request->input('protocol');
            //expiry
            $website->start_date = (string)$request->input('start_date');
            $website->end_date = (string)$request->input('end_date');
            //footer
            $website->footer_text = (string)$request->input('footer_text');

            //setting
            $website->name = $request->input('name');
            $website->layout_id = (string)$request->input('layout_id');
            $website->logo = (string)$request->input('logo');
            $website->favicon = (string)$request->input('favicon');

            //social-media
            $website->facebook = (string)$request->input('facebook');
            $website->youtube = (string)$request->input('youtube');
            $website->instagram = (string)$request->input('instagram');
            $website->linkedin = (string)$request->input('linkedin');
            $website->zalo = (string)$request->input('zalo');
            $website-> website_type_id    =  $request->input('website_type_id');

            $website->user_id = (string)$request->input('user_id');
            $website->save();
            DB::commit();
            Session::flash('success', 'Edit Layout success');
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
            $post = Website::where('id', $id)->first();
            if ($post) {
                return Website::where('id', $id)->delete();
            }
        } catch (\Exception $err) {
            return false;
        }
        return false;
    }
    public function saveHomeSection($request, $web): bool
    {
        DB::beginTransaction();
        $list = $request -> input('list');
        $col = $request -> input('col');
        try {
            $web ->  $col = $list ;
            $web->save();
            DB::commit();
            Session::flash('success', 'Edit Website success');
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            DB::rollBack();
            return false;
        }
        return true;
    }
}