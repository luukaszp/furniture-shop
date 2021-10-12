<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Services\OrderServices;
use App\Http\Requests\StoreOrder;

class OrderController extends Controller
{
    protected $orderServices;

    public function __construct(OrderServices $orderServices)
    {
        $this->orderServices = $orderServices;
    }

    /**
     * Store an order.
     */
    public function store(StoreOrder $request)
    {
        if ($request->validated()) {
            $result = $this->orderServices->store($request);
            $order = $result;
            return view('/payment', compact('order'));
        }
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
