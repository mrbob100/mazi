<?php

namespace Corp\Listeners;

use Corp\Events\onAddOrderSocialEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Corp\Models\Order;

class AddOrderSocialListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  onAddOrderSocialEvent  $event
     * @return void
     */
    public function handle(onAddOrderSocialEvent $event)
    {
        $session =session('cart');
        $order = new Order();
        $order->firstname=$event->order->name;
        $order->secondname=$event->order->email;
        $order->email=$event->order->phone;
        $order->phone=$event->order->secondname;
        $order->address=$event->order->address;
        $order->qty = session('cardCommon.qty');
        $order->sum = session('cardCommon.sum');
        return view('cart.view', ['order'=>$order ] );
    }
}
