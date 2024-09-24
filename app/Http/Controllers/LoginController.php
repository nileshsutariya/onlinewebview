<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function index()
    {
        if(Auth::guard('web')->check()){
            return redirect()->route('userdashboard');                
        }elseif(Auth::guard('admin')->check()){
            return redirect()->route('dashboard');
        }
        return view('login');
    }
    public function login(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ])->validate();
        $credentials = $request->only('email', 'password');
        $email=$request->email;
        $user =User::where('email',$email)->first(); 
        $admin = Admin::where('email', $email)->first();
        // $url=$request->url();
        // if (Auth::attempt($credentials)) {
        //     return redirect()->route('dashboard');
        // }
        if($user)
        {
            if(Auth::guard('web')->attempt($credentials)){
                return redirect()->route('userdashboard');
            }
            else {
                return back()->withInput()->withErrors(['password' => 'Wrong Password',]); 
            } 
        }
        elseif($admin)
        {
            if(Auth::guard('admin')->attempt($credentials)){
                return redirect()->route('dashboard');
            }
            else {
                return back()->withInput()->withErrors(['password' => 'Wrong Password',]); 
            }
        }
        else{
            return back()->withInput()->withErrors(['email' => 'Wrong email',]); 
        }
    }
    public function logout(Request $request)
    {
        // $token = $request->user()->token();

        Auth::guard('web')->logout();
        Auth::guard('admin')->logout();
        return redirect('/');
    }
}
        
    