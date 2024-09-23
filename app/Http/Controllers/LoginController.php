<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
            
        ])->validate();

        $users = User::where('email', $request->email)->first();
        if ($users && Hash::check($request->password, $users->password)) {
            return redirect()->route('register');
        }
    }
}
