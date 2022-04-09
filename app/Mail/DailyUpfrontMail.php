<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DailyUpfrontMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $newName = $this->details['name'] . " Upfront , Tabaasum Trading " ;

        return $this->view('email.dailyupfront')->subject($newName)
        ->with([
            'total_product' => $this->details['total_product'],
            'total_upfront' => $this->details['total_upfront'],
            'name' => $this->details['name'],
            'date' => $this->details['date'],
        ]);
    }
}
