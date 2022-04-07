<?php


namespace App\Repositories\Managemant;

use App\Models\GrammenphoneProduct;
use App\Models\GrammenphoneDailySales;
use App\Models\GrammenphoneDailyUpfront;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use DateTime;




class GrameenphoneAbstract implements GrameenphoneInterface
{
    /**
     * @var Grameenphone
     */
    private $Grameenphoneanagement;


    /**
    //  * GpManagementAbstract constructor.
     * @param Grameenphone $Grameenphone
     */
    function __construct(GrammenphoneProduct $Grameenphone)
    {
        $this->Grameenphone = $Grameenphone;
    }

    public function grameenphoneDailySales(Request $request)
    {   
        $stockShow = GrammenphoneProduct::all();
        // dd($stockShow);
        return view('admin.grameenphone.grameenphone_sales')->with("datas",$stockShow);
    }


    public function grameenphoneDailySalesSave(Request $request)
    {   
        
        foreach ($request->except('_token') as $key => $part) {
            $dt = new DateTime();
            $currTime =$dt->format('Y-m-d');
            if ($part != 0 ){
                $upfront = GrammenphoneProduct::where('id', $key)->first("upfront");
                $calculateUpfront = $upfront["upfront"] * $part;

                $sales = new ItelDailySales;
                $sales->product_id = $key;
                $sales->total_sale = $part;
                $sales->daily_upfront = $calculateUpfront;
                $sales->date = $currTime;

                $sales->save();


            }

          }
          $saingTotalSale = $this->calcuateUpfrontDaily($currTime);

          \Alert::add('success', 'Sucsuessfully Saved')->flash();
          return Redirect::back();

    }

    public function calcuateUpfrontDaily($currTime)
    {

        $totalUpfront = DB::table('grammenphone_daily_sales')->where('date','=', $currTime)->sum('daily_upfront');
        $totalProduct = DB::table('grameenphone_daily_sales')->where('date','=', $currTime)->sum('total_sale');
        
        $totalValue = new GrammenphoneDailyUpfront;
        $totalValue->total_product = $totalProduct;
        $totalValue->total_upfront = $totalUpfront;
        $totalValue->save();
    }
}
