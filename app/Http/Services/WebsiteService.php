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
    public function getAll($limit = 0, $request)
    {
        return Website::orderbyDesc('updated_at')->paginate($limit)->withQueryString();
    }

    public function create($request)
    {
        DB::beginTransaction();
        try {
             Website::create([
                'layout_id'     => (string)$request->input('layout_id'),
                'name'    => (string)$request->input('name'),
                'domain'    => (string)$request->input('domain')
            ]);

            DB::commit();
            Session::flash('success', 'Create Website success');
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
            $website->name = (string)$request->input('name');
            $website->layout_id = (string)$request->input('layout_id');
            $website->domain = (string)$request->input('domain');
            $website->start_date = (string)$request->input('start_date');
            $website->end_date = (string)$request->input('end_date');
            $website->custom_css = (string)$request->input('custom_css');
            $website->custom_js = (string)$request->input('custom_js');
            $website->protocol = (string)$request->input('protocol');
            $website->google_site_verification = (string)$request->input('google_site_verification');
            $website->google_analytic = (string)$request->input('google_analytic');
            $website->remarketing_tag = (string)$request->input('remarketing_tag');
            $website->favicon = (string)$request->input('favicon');
            $website->logo = (string)$request->input('logo');
            $website->footer_text = (string)$request->input('footer_text');
            $website->email = (string)$request->input('email');
            $website->phone = (string)$request->input('phone');
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
}