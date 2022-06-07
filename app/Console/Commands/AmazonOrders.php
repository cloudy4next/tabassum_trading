<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use PhpImap\Mailbox;
use App\Models\AmazonOrder;

class AmazonOrders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'amazon:order';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch Amazon order from mail';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $mailbox = new Mailbox(
        '{imap.gmail.com:993/imap/ssl}INBOX', 
        'jaman.ecommerce@gmail.com',
         'vnrhzqlkvgbejpfk', 
        __DIR__, 
        'UTF-8',
        true, 
        false 
        );
        try {
            $mailsIds = $mailbox->searchMailbox('UNSEEN');
        } 
        catch(PhpImap\Exceptions\ConnectionException $ex) {
                echo "IMAP connection failed: " . implode(",", $ex->getErrors('all'));
                die();
        }

        if(!$mailsIds) {
            die('Mailbox is empty');
        }


        foreach($mailsIds as $mail_id) {
            $email = $mailbox->getMail($mail_id,false // Do NOT mark emails as seen
            ); 

            if (str_contains($email->subject, 'Sold')) {

                $orderID = $this->findOrderId($email->textHtml);
                $price = $this->findPrice($email->textHtml);
                $user = AmazonOrder::where('order_id', '=', $orderID)->first();
                if ($user === null) {
                $order = new AmazonOrder;
                $order->order_id = $orderID;
                $order->price = $price;
                $order->save();

                }
                else{
                    
                    continue;
                }
                
                }

        }
    }
     public function findOrderId($mail){
        $skipTags = strip_tags($mail, '<br>');
        $pattern = "/(?<=:).*?(?=<)/i";
        $value = preg_match($pattern,$skipTags,$match);

        return $match[0];  
    }
    public function findPrice($mail){
        $skipTags = strip_tags($mail, '<br>');
        $pattern = "/(?<=earnings:).*?(?=<)/i";
        $value = preg_match($pattern,$skipTags,$match);

        return $match[0];  
    }
}