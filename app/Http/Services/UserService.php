<?php
namespace App\Http\Services;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Role;
class UserService
{



    public function getAll($limit = 0)
    {
        if($limit == 0 ){
            return User::orderbyDesc('id')->get();
        }
        return User::orderbyDesc('id')->paginate($limit)->withQueryString();;
    }
    public function getAllForSelectBox(){
        return User::select('id','name')->orderbyDesc('id')->get();
    }
    public function create($request)
    {
        DB::beginTransaction();
        try {
             $user = User::create([
                'name'          =>  $request->input('name'),
                'email'         =>  $request->input('email'),
                'password'      =>  bcrypt($request->input('password')),
                'role'          => $request->input('role'),
            ]);

            DB::commit();
            $role = Role::findOrFail($user-> role);
            $user->assignRole($role);
            Session::flash('success', 'Create User success');
            return true;
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            DB::rollBack();
            return false;
        }
    }

    public function edit($request, $user): bool
    {
        DB::beginTransaction();
        try {
            $user->name = (string)$request->input('name');
            $user->email = (string)$request->input('email');

            $user->role =  $request->input('role');
            $user->save();
            DB::commit();
            $role = Role::findOrFail($user-> role);
            $user->assignRole($role);
            Session::flash('success', 'Edit User success');
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
            $post = User::where('id', $id)->first();
            if ($post) {
                return User::where('id', $id)->delete();
            }
        } catch (\Exception $err) {
            return false;
        }
        return false;
    }


    public function getId($id)
    {
        return User::where('id', $id)->firstOrFail();
    }
}