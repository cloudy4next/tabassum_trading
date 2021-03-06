<?php


namespace App\Repositories\Managemant;

use App\Models\ItelProduct;
use App\Models\ItelDailySales;
use App\Models\ItelDailyUpfront;
use Mail;
use App\Mail\DailyUpfrontMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use DateTime;




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
        
        foreach ($request->except('_token') as $key => $part) {
            $dt = new DateTime();
            $currTime =$dt->format('Y-m-d');
            if ($part != 0 ){
                $upfront = ItelProduct::where('id', $key)->first("upfront");
                $calculateUpfront = $upfront["upfront"] * $part;

                $sales = new ItelDailySales;
                $sales->product_id = $key;
                $sales->total_sale = $part;
                $sales->daily_upfront = $calculateUpfront;
                $sales->date = $currTime;

                $sales->save();


            }

          }
          $savingTotalSale = $this->calcuateUpfrontDaily($currTime);
          $emailAfterSendResponse = $this->SendTeamMail($savingTotalSale);

          \Alert::add('success', 'Sucsuessfully Saved')->flash();
          return Redirect::back();

    }

    public function sendleadmail($emailData)

    {
         $email = 'iffatabassum@gmail.com';
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


    public function calcuateUpfrontDaily($currTime)
    {

        $totalUpfront = DB::table('itel_daily_sales')->where('date','=', $currTime)->sum('daily_upfront');
        $totalProduct = DB::table('itel_daily_sales')->where('date','=', $currTime)->sum('total_sale');
        
        $totalValue = new ItelDailyUpfront;
        $totalValue->total_product = $totalProduct;
        $totalValue->total_upfront = $totalUpfront;
        $totalValue->save();
                
        $data =array('total_product'=> $totalProduct,'total_upfront'=>$totalUpfront,'name'=>'ITEL','date'=>$currTime);
        return $data;
    }
}
