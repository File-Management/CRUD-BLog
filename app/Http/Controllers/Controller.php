<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function responSuccess($status_code,$message,$data)
    {
        return response()->json([
            'message' => $message,
            'status_code' => $status_code,
            'data' => $data
        ],200);
    }

    public function responFailed($error = null,$status_code,$message)
    {
        
    }

    public function responAuthFailed($status_code,$message)
    {
        return response()->json([
            'message' => $message,
            'status_code' => $status_code,
        ],301);
    }
}
