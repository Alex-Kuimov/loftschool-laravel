<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orders;

class AdminOrderController extends Controller
{
    public function index()
    {
        $orders = Orders::all();
        return view('admin/listOrder', ['orders' => $orders]);
    }
}
