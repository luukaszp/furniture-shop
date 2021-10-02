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
        $this->validate($request, [
            'cardNumber' => 'required',
            'cardExpiryMonth' => 'required',
            'cardExpiryYear' => 'required',
            'cardCvc' => 'required',
        ]);

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
        return redirect()->route('cart.show')->with('message', 'Płatność zakończona sukcesem!');
    }
}
