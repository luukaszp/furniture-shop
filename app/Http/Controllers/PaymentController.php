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
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function payment()
    {
        return view('payment');
    }

    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create([
            "amount" => 100 * 100,
            "currency" => "pln",
            "source" => $request->stripeToken,
            "description" => "This payment is tested purpose."
        ]);

        $order = Order::where('id', $request->orderID)->first();
        $order->payment_status = "zapłacono";
        $order->save();

        Cart::destroy();
        return redirect()->route('cart.show')->with('message', 'Płatność zakończona sukcesem!');
    }
}
