<?php

namespace App\Http\Controllers;

use App\Services\PaymentServices;
use App\Http\Requests\PaymentRequest;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    protected $paymentServices;

    public function __construct(PaymentServices $paymentServices)
    {
        $this->paymentServices = $paymentServices;
    }

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
    public function store(PaymentRequest $request)
    {
        if ($request->validated()) {
            $result = $this->paymentServices->store($request);
            return redirect()->route('cart.show')->with('message', 'Płatność zakończona sukcesem!');
        }
    }
}
