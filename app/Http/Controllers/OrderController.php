<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
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

        if($order_id === null) {
            $order->order_number = 'ORD1';
        }
        else {
            $order->order_number = 'ORD' .$order_id->id+1;
        }

        $order->order_date = Carbon::now()->format('d-m-Y');
        $order->order_amount = $request->subtotal;
        $order->tracking_number = rand(111111111111111,999999999999999);

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

    /**
     * Display all orders (admin panel - table).
     *
     * @param  array  $data
     * @return \App\Models\Order
     */
    public function index()
    {
        $orders = DB::table('orders')
        ->join('users', 'orders.user_id', '=', 'users.id')
        ->select('orders.*', 'users.name', 'users.surname')->paginate(10);
        return view('admin_panel.orders', compact('orders'));
    }

    /**
     * Edit specific order status.
     *
     * @param  Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function confirmation(Request $request, $id)
    {
        $order = Order::find($id);

        $order->order_status = "przesyłka wysłana";
        $order->save();

        $this->index();
        return redirect('admin_panel/orders');
    }

    /**
     * Display specified order
     *
     * @param  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $order = Order::where('id', $id)->first();

        return $order;
    }
}
