<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\Activity_log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class Activitylogcontroller extends Controller
{
    public function index(){
        //
    }

    public function store(Request $request){

        $validator = Validator::make($request->all(), [
            'post_id' => 'required',
            'ip_address' => 'required',
            'device_name' => 'required',
            ])->validate(); 
            
        $activity_log= new Activity_log();
        $activity_log->post_id = $request->post_id;
        $activity_log->ip_address = $request->ip_address;
        $activity_log->device_name = $request->device_name;
        $activity_log->save();
        return response()->json($activity_log);

    }
}
