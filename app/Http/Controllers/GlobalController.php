<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use function MongoDB\BSON\toJSON;

class GlobalController extends Controller
{
    public function __construct(Request $request)
    {
        $location = json_decode(file_get_contents("http://ip-api.com/json"));
        $details = json_decode(file_get_contents("https://api.covid19api.com/summary"));
        return view('welcome', ['location'=>$location,'details'=>$details]);
    }
}
