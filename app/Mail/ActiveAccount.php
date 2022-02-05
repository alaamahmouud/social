<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ActiveAccount extends Mailable
{
    use Queueable, SerializesModels;

    private $code ,$record ;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($code,$record)
    {
        //
        $this->code = $code ;
        $this->record = $record ;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.activeAccount',['code'=>$this->code , 'record' => $this->record]);
    }
}
