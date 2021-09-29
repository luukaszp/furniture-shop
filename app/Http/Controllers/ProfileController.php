<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Order;

class ProfileController extends Controller
{
    /**
     * Display user orders.
     *
     */
    public function userOrders()
    {
        $orders = Order::where('user_id', auth()->user()->id)->paginate(10);
        return view('/profile/user_orders', compact('orders'));
    }
}
