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

        $order_amount = $request->subtotal + $request->delivery;

        $order->order_date = Carbon::now()->format('d-m-Y');
        $order->order_amount = $order_amount;
        $order->tracking_number = rand(111111111111111,999999999999999);

        $id = str_replace (array('[', ']'), '' , $request->product_id);
        $amount = str_replace (array('[', ']', '"'), '' , $request->amount);

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

        return view('/payment', compact('order'));
    }

    /**
     * Display all orders (admin panel - table).
     */
    public function index()
    {
        $orders = DB::table('orders')
        ->join('users', 'orders.user_id', '=', 'users.id')
        ->select('orders.*', 'users.name', 'users.surname')->paginate(10);
        return view('admin_panel.orders', compact('orders'));
    }

    /**
     * Edit specific order status (order realization).
     */
    public function realization(Request $request, $id)
    {
        $order = Order::find($id);

        $order->order_status = "przesyłka wysłana";
        $order->save();

        $this->index();
        return redirect('admin_panel/orders');
    }

    /**
     * Edit specific order status (order received).
     */
    public function received(Request $request, $id)
    {
        $order = Order::find($id);

        $order->order_status = "przesyłka odebrana";
        $order->save();

        return redirect('/profile/user_orders');
    }

    /**
     * Display specified order
     */
    public function show($id)
    {
        $orders = Order::where('id', $id)->with(['products:id,name,price,color,size', 'users:id'])->get();

        if(auth()->user()->id == $orders[0]['users']['id'] || auth()->user()->roles->is_admin) {
            return view('order_info', compact('orders'));
        }
        else {
            return view('errors/401');
        }
    }

    /**
     * Display specified order for id fetch.
     */
    public function showOrder($id)
    {
        $order = Order::where('id', $id)->first();
        return $order;
    }
}
