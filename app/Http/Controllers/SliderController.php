<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::paginate(3);
        // $sliders = Slider::orderBy('created_at', 'desc')->take(3)->get();
        return view('slider', compact('sliders'));
    }
    public function store(Request $request)
    {
        $slider= new Slider();
        $slider->title = $request->title;
        $slider->description = $request->description;
        $image=$request->file('image');
        $imagename= $image->getClientOriginalName();
        $imagepath='public/slider/';
        $image->move($imagepath,$imagename);
        $slider->slider=$imagename;
        $slider->save();
        $url=$request->url();
        return redirect()->route('slider.index')->with('store', 'Slider Image Stored Successfully!!');
    }
    public function edit($id)
    {
        $sliders= Slider::paginate(3);
        $slider = Slider::find($id);
        // print_r($id); die();
        $slider = Slider::where('id',$id)->first();

        return view('slider',compact('slider', 'sliders'));
    }
    public function update(Request $request)
    {
        $slider = Slider::find($request->id); 
        // print_r($request->id); die();
        $slider->title = $request->title;
        $slider->description = $request->description;
        if($image=$request->file('image')){
            $imagename= $image->getClientOriginalName();
            $imagepath='public/slider/';
            $image->move($imagepath,$imagename);
            $slider->slider=$imagename;
        }
        $slider->save();
        return redirect()->route('slider.index')->with('update', 'Slider Image Updated Successfully!!');
    }
    public function delete($id)
    {
        $sliders= Slider::find($id)->delete();
        return redirect()->route('slider.index')->with('delete', 'Slider Image Deleted Successfully!');
  
    }
}
