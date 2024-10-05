<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\Activity_log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class Activitylogcontroller extends BaseController
{
    public function index(){
        //
    }

    public function store(Request $request){

        $validator = Validator::make($request->all(), [
            'filter_param.post_id' => 'required',
            'filter_param.ip_address' => 'required',
            'filter_param.device_name' => 'required',
        ]);
        if($validator->fails()){
            return $this->apierror( ['errors' => $validator->errors()->all()]);
        }
            
        $activity_log= new Activity_log();
        $activity_log->post_id = $request->filter_param['post_id'];
        $activity_log->ip_address = $request->filter_param['ip_address'];
        $activity_log->device_name = $request->filter_param['device_name'];
        $activity_log->save();
        return $this->apisuccess($activity_log, 'activity log stored successfully');

    }
}
