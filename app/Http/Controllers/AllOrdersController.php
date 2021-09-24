<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orders;

class AllOrdersController extends Controller
{
    public function allOrders()
    {
        $orders = Orders::all();
        return view('admin/allOrders', ['orders' => $orders]);
    }
}
