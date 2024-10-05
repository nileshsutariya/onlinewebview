<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class BaseController extends Controller
{
    public function apisuccess($result, $message)
    {
        // $code = Http::get('https://192.168.1.165/api');
        // $status=$code->status();
    	$response = [
            'success' => true,
            'status'=>1,
            'message' => $message,
            'data'    => $result,
        ];
 
        return response()->json($response, 200);
    }
    public function apierror($error, $errorMessages = [], $code = 404)
    {
    	$response = [
            'success' => false,
            'status'=>0,
            'message' => $error,
        ];
 
        if(!empty($errorMessages)){
            $response['data'] = $errorMessages;
        }
 
        return response()->json($response, $code);
    }
}
