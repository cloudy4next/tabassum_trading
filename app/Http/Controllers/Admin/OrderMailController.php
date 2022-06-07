<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PhpImap\Mailbox;
use App\Models\AmazonOrder;

class OrderMailController extends Controller
{
    
    
    public function mailOrder (Request $request)
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

        // if ($mail->textHtml){
        //     $orderID = $this->findOrderId($mail->textHtml);
        //     $price = $this->findPrice($mail->textHtml);

        // }




        
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


};

