<?php

namespace App\Http\Controllers;

use session;
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
        $url=$request->url();
        if($user){
            if ((int) $user->status == 1) {
                if (Auth::attempt($credentials)) {
                    return redirect()->route(route: 'dashboard');
                } else {
                    Auth::logout();
                    return back()->withInput()->withErrors(['password' => 'Wrong Password',]); 
                }
            } else {
                Auth::logout();
                return back()->withInput()->withErrors(['inactive' => 'your account is not active',]); 
            }
        } else {
            Auth::logout();
            return back()->withInput()->withErrors(['email' => 'you have to register first',]); 
        }
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('loginform');
    }
}
        
    