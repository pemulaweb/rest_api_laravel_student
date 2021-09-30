<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Payment;

class UtangMail extends Mailable
{
    use Queueable, SerializesModels;

    public $bayar;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($bayar)
    {
        $this->bayar = $bayar;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Informasi hutanmu nak')->response()->json(['your payments already recieve and thank u']);
    }
}