<?php

namespace App\Http\Controllers\API;

use App\Models\Post;
use App\Models\User;
use App\Models\Slider;

use App\Models\AdsLink;
use App\Models\Category;
use App\Models\Activity_log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\API\BaseController;

class apiController extends BaseController
{
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

    
    public function category(Request $request){
        $category=Category::offset($request->start*$request->length)->limit($request->length)->get();
        return $this->apisuccess($category, 'category list');

    }

    public function bycategory(Request $request){
        $validator = Validator::make($request->all(), [
            'filter_param.id' => 'required',
        ]);
        if($validator->fails()){
            return $this->apierror( ['errors' => $validator->errors()->all()]);
        }
        $id=$request->filter_param['id'];
        // print_r($id); die;
        $post=Post::where('category_id',$id)->offset($request->start*$request->length)->limit($request->length)->get();
        if ($post->isEmpty()) {
            return $this->apierror(['error' => 'Post not found'], ['id_not_found' => true], 404);
        }
        return $this->apisuccess($post, 'bycategory list');

    }
    public function post(Request $request){
        $post=Post::offset($request->start*$request->length)->limit($request->length)->get();
        return $this->apisuccess($post, 'post list');

    }
    public function postdetails(Request $request){
        $validator = Validator::make($request->all(), [
            'filter_param.id' => 'required|exists:post,id',
        ]);
        if($validator->fails()){
            return $this->apierror( ['errors' => $validator->errors()->all()]);
        }
        $id=$request->filter_param['id'];
        $post=Post::find($id);
        return $this->apisuccess($post, 'postdetails');
    }
    public function slider(Request $request)
    {
        $sliders = Slider::orderBy('created_at', 'desc')->take(3)->get();
        return $this->apisuccess($sliders, 'slider list');

    }
    public function most_famous(Request $request){
        $data = Activity_log::select('post_id')
                    ->selectRaw('COUNT(post_id) as repetition_count')
                    ->groupBy('post_id')
                    ->orderBy('repetition_count', 'desc')
                    ->offset($request->start*$request->length)->limit($request->length)
                    ->pluck('post_id');

        $datas = collect();
        foreach($data as $value){
            $posts = Post::where('id', $value)->get();
            $datas = $datas->merge($posts);
        }  
        return $this->apisuccess($datas, 'most famous list');
    }

    public function index()
    {
        $adslinks = AdsLink::all();
        return $this->apisuccess($adslinks, 'ads_link list');
    }
}
