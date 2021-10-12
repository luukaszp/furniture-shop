<?php

namespace App\Services;

use App\Models\Order;
use Stripe;
use Cart;

class PaymentServices
{
    /**
     * Save payment and clear cart.
     */
    public function store($request)
    {
        $order = Order::where('id', $request->orderID)->first();

        $stripe = Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        try {
            $response = \Stripe\Token::create(array(
                "card" => array(
                    "number"    => $request->cardNumber,
                    "exp_month" => $request->cardExpiryMonth,
                    "exp_year"  => $request->cardExpiryYear,
                    "cvc"       => $request->cardCvc
                )));

            $charge = Stripe\Charge::create([
                "amount" => 100 * $order->order_amount,
                "currency" => "pln",
                "source" => $response->id,
                "description" => 'Zapłata za zamówienie ' .$order->order_number
            ]);

            if($charge['status'] !== 'succeeded') {
                return redirect()->route('cart.show')->with('error', 'Coś poszło nie tak. Spróbuj ponownie.');
            }
        }
        catch (Exception $e) {
            return $e->getMessage();
        }

        $order->payment_status = "zapłacono";
        $order->save();

        Cart::destroy();

        return $order;
    }
}
