<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Models\User;

class LoginController extends Controller
{

    public function index()
    {
        if(Auth::guard('admin')->check()) {
            return redirect() -> route('dashboard');
        }
        return view('admin.login', [
            'title' => 'Sign In'
        ]);
    }

    public function store(Request $request)
    {

        try {
            $messages = [
                'email.required' => 'Email required',
                'email.filter' => 'invalid email',
                'password.required' => 'password required',
            ];
            $validator = Validator::make($request->all(), [
                'email' => 'required|email:filter',
                'password' => 'required'
                ],$messages);


            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator);
            }
            $admin = Admin::where('email', $request->input('email'))->first();
            if (!Hash::check($request->input('password'), $admin->password)) {
                Session::flash('error', 'Email or Password is incorrect');
                return redirect()->back();
            }
            Auth::guard('admin')->login($admin);
            return redirect() -> route('dashboard');
        }  catch (\Exception $error) {
            Session::flash('error', $error ->getMessage());
            return redirect()->back();
        }
    }
    public function logout( Request $request )
    {
        if(Auth::guard('admin')->check()) // this means that the admin was logged in.
        {
            Auth::guard('admin')->logout();
            return redirect()->route('login');
        }

        return redirect() -> route('login');
    }
}
