<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    // Custom method to return JSON responses
    /*protected function jsonResponse($data, $status = 200)
    {
        return response()->json($data, $status)
                         ->header('Accept', 'application/json');
    }*/
}
