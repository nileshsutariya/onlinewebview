<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $category = Category::all();
        return view('category', compact('category', 'categories'));
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
        $slug = Str::slug($request->name);
        $str = strtolower($request->name);
        $category->slug = preg_replace('/\s+/', '-', $str);
        if ($request['status'] == 'on') {
            $status = 1;
        } else {
            $status = 0;
        }
        $category->status = $status;
        $category->save();
        return redirect()->route('categories.index');
    }
    public function edit($id)
    {
        $categories= Category::paginate(4);
        $category = Category::find($id);
        return view("categories.index",compact('category', 'categories'));
    }
}
