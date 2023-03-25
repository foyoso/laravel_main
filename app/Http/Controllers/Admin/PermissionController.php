<?php

namespace App\Http\Controllers\Admin;

use App\Utils\WebConst;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class PermissionController extends Controller
{

    //list
    public function index(Request $request)
    {
        return view('admin.permission.index', [
           'title' => 'List permission',
           'data' => Permission::all()
        ]);
    }
    //list
    public function add(Request $request)
    {
        return view('admin.permission.add', [
           'title' => 'Add permission',

        ]);
    }
    public function store(Request $request)
    {
        Permission::create($request->input());
        return redirect('/admin/permission/');
    }
    public function show(Permission $item)
    {
        return view('admin.permission.edit', [
            'title' => 'Edit permission',
            'data' => $item
         ]);
    }
    public function edit(Permission $item, Request $request)
    {
        $item -> name = $request -> name;
        $item -> group_name = $request -> group_name;
        $item -> guard_name = $request -> guard_name;
        $item -> save();

        return redirect('/admin/permission');
    }
    public function delete(Request $request): JsonResponse
    {
        $id = (int)$request->input('id');
        Permission::findOrFail($id)-> delete();
        return response()->json([
            'error' => false,
            'message' => 'Delete Permission success '
        ]);
    }

}
