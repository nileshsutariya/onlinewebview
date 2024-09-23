<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function index()
    {
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
                        if (Auth::attempt($credentials)) {
                            return redirect()->route('dashboard');
                        }
                    }
        }
        
    