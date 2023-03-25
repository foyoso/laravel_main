<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Services\UserService;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
class UserController extends Controller
{
    protected $userService;
    public function __construct(UserService $userService)
    {
        $this -> userService = $userService;
    }

    //list
    public function index(Request $request)
    {

        return view('admin.user.index', [
           'title' => 'List User',
           'data' =>  $this -> userService -> getAll(ITEM_PER_PAGE, $request),

        ]);
    }
    public function add( Request $request)
    {

        return view('admin.user.add', [
           'title' => 'Add user',
            'roles' => Role::where('guard_name', 'user') -> get()
        ]);
    }
    public function store(Request $request)
    {
        $this->userService->create($request);
        return redirect('/admin/user');
    }
    public function show(User $item)
    {
        return view('admin.user.edit', [
           'title' => 'Edit User',
           'data' => $item,
           'roles' => Role::where('guard_name', 'user') -> get()
        ]);
    }
    public function edit(User $item, Request $request)
    {
        $this->userService->edit($request, $item);
        return redirect('/admin/user') ;
    }
    public function delete(Request $request): JsonResponse
    {
        $result = $this->userService->delete($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Delete User success '
            ]);
        }
        return response()->json([
            'error' => true
        ]);
    }





}
