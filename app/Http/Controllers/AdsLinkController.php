<?php

namespace App\Http\Controllers;

use App\Models\AdsLink;
use Illuminate\Http\Request;

class AdsLinkController extends Controller
{
    public function index()
    {
        $adslinks = AdsLink::paginate(5);
        return view('ads-link', compact('adslinks'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'link' => 'required|url',
        ]);

        $adsLink = AdsLink::create($request->only('title', 'link'));

        $url=$request->url();
        if (strpos($url, 'api') == true){
            return response()->json($adsLink);
        } else {
            return redirect()->route('ads.index')->with('store', 'Ads Detail Created Successfully!!');
        }    
    }
    public function edit($id)
    {
        $adslinks= AdsLink::paginate(5);
        $adsLink = AdsLink::find($id);
        // print_r($id); die();
        $adsLink = AdsLink::where('id',$id)->first();

        return view('ads-link',compact('adslinks', 'adsLink'));
    }
    public function update(Request $request)
    {
        $adsLink = AdsLink::find($request->id); 
        // print_r($request->id); die();
        $adsLink->title = $request->title;
        $adsLink->link = $request->link;
        $adsLink->save();
        return redirect()->route('ads.index')->with('update', 'Ads Detail Updated Successfully!!');
    }
    public function delete($id)
    {
        $adslinks= AdsLink::find($id)->delete();
        return redirect()->route('ads.index')->with('delete', 'Ads Detail Deleted Successfully!');
    }
}
