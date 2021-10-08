<?php

namespace App\Services;

use App\Models\Order;
use App\Models\Product;
use Carbon\Carbon;

class OrderServices
{
    /**
     * Store a newly created order.
     */
    public function store($data)
    {
        $order = new Order();
        $order->user_id = auth()->user()->id;
        $order_id = Order::latest()->first();

        if($order_id === null) {
            $order->order_number = 'ORD1';
        }
        else {
            $order->order_number = 'ORD' .$order_id->id+1;
        }

        $order_amount = $data->subtotal + $data->delivery;

        $order->order_date = Carbon::now()->format('d-m-Y');
        $order->order_amount = $order_amount;
        $order->tracking_number = rand(111111111111111,999999999999999);

        $id = str_replace (array('[', ']'), '' , $data->product_id);
        $amount = str_replace (array('[', ']', '"'), '' , $data->amount);

        $productID = explode(",", $id);
        $productAmount = explode(",", $amount);

        $countID = count($productID);

        $order->save();

        for($i = 0; $i < $countID; $i++) {
            $product = Product::find($productID[$i]);
            $product->amount -= (int)$productAmount[$i];
            $product->save();
            $order->products()->attach($product, ['quantity' => $productAmount[$i]]);
        }

        return $order;
    }
}
