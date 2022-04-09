<?php


namespace App\Repositories\Managemant;

use App\Models\GrammenphoneProduct;
use App\Models\GpDailySale;
use App\Models\GrammenphoneDailyUpfront;
use Mail;
use App\Mail\DailyUpfrontMail;

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


    public function gpSaleCaluation(Request $request)
    {   
        
        foreach ($request->except('_token') as $key => $part) {
            $dt = new DateTime();
            $currTime =$dt->format('Y-m-d');
            if ($part != 0 ){
                $upfront = GrammenphoneProduct::where('id', $key)->first("upfront");
                $calculateUpfront = $upfront["upfront"] * $part;
                // dd($calculateUpfront);
                $sales = new GpDailySale;
                $sales->product_id = $key;
                $sales->total_sale = $part;
                $sales->daily_upfront = $calculateUpfront;
                $sales->date = $currTime;

                $sales->save();


            }

          }
          \Alert::add('success', 'Sucsuessfully Saved')->flash();
          $savingTotalSale = $this->calcuatefrontDaily($currTime);
          $emailAfterSendResponse = $this->SendTeamMail($savingTotalSale);


          return Redirect::back();

    }
    public function sendleadmail($emailData)

    {
         $email = 'jahangir.hossein7200@gmail.com';
        //  $email = 'jahangir.hossein7200@gmail.com';

        Mail::to($email)->send(new DailyUpfrontMail($emailData));

        if (Mail::failures()) {
            return false;
        }

        return true;
    }

    public function SendTeamMail($emailData)
    {
        $emailResponse = $this->sendleadmail($emailData);

        return response()->json(['email_send' => $emailResponse]);
    }

    public function calcuatefrontDaily($currTime)
    {

        $totalUpfront = DB::table('gp_daily_sales')->where('date','=', $currTime)->sum('daily_upfront');
        $totalProduct = DB::table('gp_daily_sales')->where('date','=', $currTime)->sum('total_sale');
        
        $totalValue = new GrammenphoneDailyUpfront;
        $totalValue->total_product = $totalProduct;
        $totalValue->total_upfront = $totalUpfront;
        $totalValue->save();
        
        $data =array('total_product'=> $totalProduct,'total_upfront'=>$totalUpfront,'name'=>'GrameenPhone','date'=>$currTime);
        return $data;
    }


}
