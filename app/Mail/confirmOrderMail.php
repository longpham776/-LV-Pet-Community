<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class confirmOrderMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($thongtin,$data,$total)
    {
        $this->thongtin=$thongtin;
        $this->cart=$data;
        $this->total=$total;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
        ->subject("Cảm ơn bạn đã đặt hàng!")
        ->view('frontend.confirmOrderMail')
        ->with([
            'thongtin'=> $this->thongtin,
            'cart'=> $this->cart,
            'totalcart'=>$this->total
        ]);
    }
}
