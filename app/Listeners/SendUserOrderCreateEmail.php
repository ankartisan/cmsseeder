<?php

namespace App\Listeners;


use App\Mail\OrderCreateMail;
use Illuminate\Support\Facades\Mail;

class SendUserOrderCreateEmail
{
    /**
     * Handle the event.
     *
     * @param  $event
     * @return void
     */
    public function handle($event)
    {
        $order = $event->order;

        Mail::send(new OrderCreateMail($order));

    }
}
