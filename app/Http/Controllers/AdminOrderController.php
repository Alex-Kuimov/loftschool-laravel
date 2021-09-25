<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orders;

class AdminOrderController extends Controller
{
    public function index()
    {
        $orders = Orders::paginate(20);
        return view('admin/listOrder', ['orders' => $orders]);
    }
}
