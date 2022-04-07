<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Managemant\GrameenphoneInterface;


class GrameenphoneController extends Controller
{
    public function __construct(GrameenphoneInterface $GPManage)
    {
        $this->GPManage = $GPManage;
    }

    public function grameenphoneSale (Request $request ,GrameenphoneInterface $GPManage )
    {
        // dd("val");
        return $GPManage->grameenphoneDailySales($request);
    }

    public function grameenphoneSaleSave (Request $request ,GrameenphoneInterface $GPManage )
    {
        // dd($request->all());
        return $GPManage->gpSaleCaluation($request);
    }
    //
}
