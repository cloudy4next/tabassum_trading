<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Config;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use App\Repositories\ItelManagementInterface;
use App\Repositories\Managemant\ItelManagementInterface;

class ItelController extends Controller
{
    public function __construct(ItelManagementInterface $itelManage)
    {
        $this->itelManage = $itelManage;
    }

    public function itelSale (Request $request ,ItelManagementInterface $itelManage )
    {
        // dd("val");
        return $itelManage->itelDailySales($request);
    }

    public function itelSaleSave (Request $request ,ItelManagementInterface $itelManage )
    {
        return $itelManage->itelDailySalesSave($request);
    }

    public function facebook_pixed (Request $request)
    {
        // dd(config('facebook-pixel.facebook_pixel_id'));

        return view("admin.itel.fb");
    }

    #### testing 
    // public function facebook_pixed_save (Request $request)
    // {
    //     // dd();
    //     Config::set('facebook-pixel.facebook_pixel_id', $request->input('fb_id'));
    //     dd(config('facebook-pixel.facebook_pixel_id'));
    //     // return view("admin.itel.fb");
    // }
}
