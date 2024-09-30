<?php

namespace App\Http\Controllers\API;

use App\Models\Post;
use App\Models\User;

use App\Models\Slider;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class apiController extends Controller
{
    public function index(){
        $category=Category::all();
        $posts= Post::all();
        return response()->json(compact('category','posts'));
    }
    public function category(){
        $category=Category::all();
        return response()->json($category);
    }
    public function post(){
        $post=Post::all();
        return response()->json($post);
    }
    public function login(Request $request){
        // print_r("xdxfghjkl;");die;
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ])->validate();
        $credentials = $request->only('email', 'password');
        $email=$request->email;
        $user =User::where('email',$email)->first(); 
        if($user){
            if ((int) $user->status == 1) {
                if (Auth::attempt($credentials)) {
                    return response()->json($user);
                } else {
                    Auth::logout();
                    return response()->json('Wrong Password'); 
                }
            } else {
                Auth::logout();
                return response()->json( 'your account is not active'); 
            }
        } else {
            Auth::logout();
            return response()->json('you have to register first'); 
        }
    }
    public function slider()
    {
        $sliders = Slider::orderBy('created_at', 'desc')->take(3)->get();
        return response()->json($sliders);
    }
}
