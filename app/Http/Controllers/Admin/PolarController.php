<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Polar;

class PolarController extends Controller
{
    //


    public function getSmsList(Request $request)
    {

        $retailInfo = Polar::all();

        return view('admin.polar.sms')->with("retailInfo", $retailInfo);
    }

    public function getSmsListUser(Request $request)
    {

        $retailInfo = Polar::all();
        return response()->json($retailInfo, 200);
    }

    public function smsSent(Request $request)
    {
        dd($request->all());
    }
}
