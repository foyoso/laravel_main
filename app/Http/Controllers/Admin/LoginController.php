<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{

    public function index()
    {
        if(Auth::check()) {
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

            if (Auth::attempt([
                    'email' => $request->input('email'),
                    'password' => $request->input('password')
                ], $request->input('remember'))) {
                return redirect()->route('admin');
            }
            Session::flash('error', 'Email or Password is incorrect');
            return redirect()->back();
        }  catch (\Exception $error) {
            Session::flash('error', $error ->getMessage());
            return redirect()->back();
        }
    }
}
