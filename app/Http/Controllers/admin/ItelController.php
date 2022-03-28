<?php

namespace App\Http\Controllers\admin;

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
}
