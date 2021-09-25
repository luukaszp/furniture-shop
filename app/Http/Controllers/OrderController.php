<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use Carbon\Carbon;

class OrderController extends Controller
{
    /**
     * Display all orders (admin panel - table).
     *
     * @param  array  $data
     * @return \App\Models\Product
     */
    public function index()
    {
        return view('admin_panel.orders');
    }

    /**
     * Store an order.
     *
     * @param  array  $data
     * @return \App\Models\Order
     */
    protected function store(Request $request)
    {
        $order = new Order();
        $order->user_id = auth()->user()->id;
        $order_id = Order::latest()->first();

        if($order_id->id === null) {
            $order->order_number = 'ORD1';
        }
        else {
            $order->order_number = 'ORD' .$order_id->id+1;
        }

        $order->order_date = Carbon::now()->format('d-m-Y');
        $order->order_amount = $request->subtotal;

        $id = str_replace (array('[', ']'), '' , $request->product_id);
        $amount = str_replace (array('[', ']', '"'), '' , $request->amount);

        $productID = explode(",", $id);
        $productAmount = explode(",", $amount);

        $countID = count($productID);

        $order->save();
        $orderID = $order->id;

        for($i = 0; $i < $countID; $i++) {
            $product = Product::find($productID[$i]);
            $product->amount -= (int)$productAmount[$i];
            $product->save();
            $order->products()->attach($product);
        }

        return view('/payment', compact('orderID'));
    }
}
