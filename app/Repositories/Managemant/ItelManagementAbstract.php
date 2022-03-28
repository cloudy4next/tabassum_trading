<?php


namespace App\Repositories\Managemant;

use App\Models\ItelProduct;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;




class ItelManagementAbstract implements ItelManagementInterface
{
    /**
     * @var ItelManagement
     */
    private $ItelManagement;


    /**
     * GpManagementAbstract constructor.
     * @param ItelManagement $Itelmanagement
     */
    function __construct(ItelProduct $itelManagement)
    {
        $this->itelManagement = $itelManagement;
    }

    public function itelDailySales(Request $request)
    {   
        $stockShow = ItelProduct::all();
        // dd($stockShow);
        return view('admin.itel.itel_sales')->with("datas",$stockShow);
    }


    public function itelDailySalesSave(Request $request)
    {   
        dd($request->all());
    }
}
