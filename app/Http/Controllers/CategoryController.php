<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class CategoryController extends Controller
{
    public function index(Request $request)
    {
        if ($request->id) {
            $query = Category::where('id',$request->id)->first();
            if($query->status==1){
                $query->status=0;
            }else{
                $query->status=1;
            }
            $query->save();
        }
        $categories = Category::all();
        return view('category', compact( 'categories'));
    }
    public function store(Request $request)
    {
        $category = new Category();
        $category->name = $request['name']; 
        if($icon = $request->file('icon')){
            $imagename = $icon->getClientOriginalName();
            $imagepath='public/imageuploaded/';
            $icon->move($imagepath, $imagename);

            $category->icon=$imagename;
        }
        if ($request['status'] == 'on') {
            $status = 1;
        } else {
            $status = 0;
        }
        $category->status = $status;
        $category->save();
        $url=$request->url();
            if (strpos($url, 'api') == true){
                 return response()->json("added successfully.");
             }else{
                return redirect()->route('categories.index');
            }
    }
    public function edit($id)
    {
        $categories= Category::all();
        $category = Category::find($id);
        $category = Category::where('id',$id)->first();

        return view('category',compact('category', 'categories'));
    }
    public function update(request $request)
    {   
        $validator = Validator::make($request->all(), [
            'name' => 'required'
        ])->validate();

        $category = Category::find($request->id);  
        
        $category->name = $request->name; 
        if($icon=$request->file('icon')){
            $imagename= $icon->getClientOriginalName();
            $imagepath='public/imageuploaded/';
            $icon->move($imagepath,$imagename);

            $category->icon=$imagename;
        }
        if ($request['status'] == '1') {
            $status = 1;
        } else { 
            $status = 0;
        }
        $category->status = $status;
        $category->save();
        // $categories= Category::all();
            return redirect()->route('categories.index')->with('update', 'Item Updated Successfully!!');
    }
    public function delete($id)
    {
        $categories = Category::find($id)->delete();
        return redirect()->route('categories.index')->with('delete', 'Item Deleted Successfully!');
    }
}
