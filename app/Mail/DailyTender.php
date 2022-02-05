<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DailyTender extends Mailable
{
    use Queueable, SerializesModels;

    private  $categoryWithTenders ;
    private  $client ;

    /**
     * Create a new message instance.
     *
     * @param $categoryWithTenders
     * @param $client
     */
    public function __construct($categoryWithTenders,$client)
    {
        $this->categoryWithTenders = $categoryWithTenders ;
        $this->client = $client ;


        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('email.tenders.daily',[
            'categoryWithTenders' => $this->categoryWithTenders,
            'client' => $this->client
        ])->subject("Daily Tender - ".now()->format('d/m/Y'));
    }
}
