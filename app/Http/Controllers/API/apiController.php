<?php

namespace App\Http\Controllers\API;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class apiController extends Controller
{
    public function index(){
    }
    // public function login(Request $request){
    //     $validator = Validator::make($request->all(), [
    //         'email' => 'required|email',
    //         'password' => 'required',
    //     ])->validate();
    //     $credentials = $request->only('email', 'password');
    //     $email=$request->email;
    //     $user =User::where('email',$email)->first(); 
    //     if($user){
    //         if ((int) $user->status == 1) {
    //             if (Auth::attempt($credentials)) {
    //                 return response()->json($user);
    //             } else {
    //                 Auth::logout();
    //                 return response()->json('Wrong Password'); 
    //             }
    //         } else {
    //             Auth::logout();
    //             return response()->json( 'your account is not active'); 
    //         }
    //     } else {
    //         Auth::logout();
    //         return response()->json('you have to register first'); 
    //     }
    // }
    public function category(){
        $category=Category::all();
        return response()->json($category);
    }
    public function bycategory($id){
        $post=Post::where('category_id',$id)->get();
        return response()->json($post);
    }
    public function post(){
        $post=Post::all();
        return response()->json($post);
    }
    public function postdetails($id){
        $post=Post::find($id);
        return response()->json($post);
    }
}
