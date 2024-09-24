<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function index(){
        $category=Category::all();
        $posts= Post::leftJoin('category','category.id','=','post.category_id')->select('post.*','category.name as categoryname')->paginate(3);
        return view('post.index',compact('category','posts'));
    }
    
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'link' => 'required',
            'visible' => 'required|in:true,false',
            ])->validate(); 
            
        $image=$request->file('image');
        $imagename= $image->getClientOriginalName();
        $imagepath='public/imageuploaded/';
        $image->move($imagepath,$imagename);
        
        $suggested = $request->suggested == 'on' ? 1 : 0;
        $visible = $request->visible == 'true' ? 1 : 0;

        $slug = Str::slug($request->title);
        $str = strtolower($request->title);

        $post= new Post();
        $post->category_id = $request->category_id;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->banner=$imagename;
        $post->link=$request->link;
        $post->is_suggested= $suggested;
        $post->slug = preg_replace('/\s+/', '-', $str);
        $post->is_visible = $visible;
        $post->save();
        $url=$request->url();
        return redirect()->route('post.index')->with('store', 'post Created Successfully!!');
    }
    public function edit($id){
        $posts= post::paginate(3);
        $post = post::find($id);
        $category= Category::all();
        return view("post.index",compact('post', 'posts', 'category'));
    }

    public function update(Request $request){
        // print_r($request->all());die();
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'link' => 'required',
            'visible' => 'required|in:true,false',
        ])->validate(); 
        
        $slug = Str::slug($request->title);
        $str = strtolower($request->title);
        
        $post = Post::find($request->id); 
        if($image=$request->file('image')){
            $image=$request->file('image');
            $imagename= $image->getClientOriginalName();
            $imagepath='public/imageuploaded/';
            $image->move($imagepath,$imagename);
            $post->banner=$imagename;
        }
        $post->category_id = $request->category_id;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->link=$request->link;
        $post->is_suggested= $request->suggested == 'on' ? 1 : 0;
        $post->slug = preg_replace('/\s+/', '-', $str);
        $post->is_visible = $request->visible == 'true' ? 1 : 0;
        $post->save();
        return redirect()->route('post.index')->with('store', 'post Updated Successfully!!');
    }
    public function delete($id)
    {
        $posts= Post::find($id)->delete();
        return redirect()->route('post.index')->with('delete', 'post Deleted Successfully!');
    }
}
