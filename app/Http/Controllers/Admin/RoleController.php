<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Session;
class roleController extends Controller
{

    //list
    public function index(Request $request)
    {
        return view('admin.role.index', [
           'title' => 'List role',
           'data' => Role::all()
        ]);
    }
    //list
    public function add(Request $request)
    {
        return view('admin.role.add', [
           'title' => 'Add role',

        ]);
    }
    public function store(Request $request)
    {
        Role::create($request->input());
        return redirect('/admin/role/');
    }
    public function show(Role $item)
    {

        return view('admin.role.edit', [
            'title' => 'Edit role',
            'data' => $item,
            'permissionGroups' => User::getpermissionGroups()
         ]);
    }
    public function edit(Role $item, Request $request)
    {
        $item -> name = $request -> name;

        $item -> save();

        $permission = $request -> permission;
        $item->syncPermissions($permission);
        Session::flash('success', 'Upate role success');
        return redirect('/admin/role');
    }
    public function delete(Request $request): JsonResponse
    {
        $id = (int)$request->input('id');
        Role::findOrFail($id)-> delete();
        return response()->json([
            'error' => false,
            'message' => 'Delete Permission success '
        ]);
    }

    public function addRolePermission(Request $request){
        return view('admin.role.add-role-permission', [
            'title' => 'Edit role',
             'role' => Role::all(),

             'permissionGroups' => User::getpermissionGroups()
         ]);
    }
    public function storeRolePermission(Request $request){
         $data = array();
         $permission = $request -> permission;
         $role_id = $request -> role_id;
         $role = Role::findOrFail($role_id);
         $role->syncPermissions($permission);
         return redirect('/admin/role/addRolePermission');
    }
    public function test(){
        $user = User::findOrFail(1);
        $role = Role::findOrFail(3);
        $user->assignRole($role);
        dd($user-> getRoleNames());
    }

}
