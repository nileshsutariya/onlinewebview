<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('category');
    }
    public function store(Request $request)
    {
        $category = new Category();
        $category->name = $request['name']; 
        if($image = $request->file('image')){
            $imagename = $image->getClientOriginalName();
            $imagepath='imageuploaded/';
            $image->move($imagepath, $imagename);

            $category->image=$imagename;
        }
        if ($request['status'] == '1') {
            $status = 1;
        } else {
            $status = 0;
        }
        $category->status = $status;
        $category->save();
    }
}
