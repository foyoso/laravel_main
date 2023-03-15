<?php
namespace App\Http\Services;
use App\Models\Layout;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
class LayoutService
{



    public function getAll($limit = 0)
    {
        if($limit == 0 ){
            return Layout::orderbyDesc('id')->get();
        }
        return Layout::orderbyDesc('id')->paginate($limit)->withQueryString();;
    }
    public function getAllForSelectBox(){
        return Layout::select('id','name')->orderbyDesc('id')->get();
    }
    public function create($request)
    {
        DB::beginTransaction();
        try {
             Layout::create([
                'link_demo'     => (string)$request->input('link_demo'),
                'name'    => (string)$request->input('name'),
                'directory'    => (string)$request->input('directory')
            ]);

            DB::commit();
            Session::flash('success', 'Create Layout success');
            return true;
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            DB::rollBack();
            return false;
        }
    }

    public function edit($request, $layout): bool
    {
        DB::beginTransaction();
        try {
            $layout->name = (string)$request->input('name');
            $layout->link_demo = (string)$request->input('link_demo');
            $layout->directory = (string)$request->input('directory');
            $layout->save();
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
            $post = Layout::where('id', $id)->first();
            if ($post) {
                return Layout::where('id', $id)->delete();
            }
        } catch (\Exception $err) {
            return false;
        }
        return false;
    }


    public function getId($id)
    {
        return Layout::where('id', $id)->firstOrFail();
    }
}