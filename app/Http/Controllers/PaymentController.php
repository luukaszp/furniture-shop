<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Stripe;
use Session;
use Cart;

class PaymentController extends Controller
{
    /**
     * Display payment view.
     */
    public function payment()
    {
        return view('payment');
    }

    /**
     * Save payment and clear cart.
     */
    public function store(Request $request)
    {
        $order = Order::where('id', $request->orderID)->first();
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create([
            "amount" => 100 * $order->order_amount,
            "currency" => "pln",
            "source" => $request->stripeToken,
            "description" => 'Zapłata za zamówienie ' .$order->order_number
        ]);

        $order->payment_status = "zapłacono";
        $order->save();

        Cart::destroy();
        return redirect()->route('cart.show')->with('message', 'Płatność zakończona sukcesem!');
    }
}
