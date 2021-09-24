<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
