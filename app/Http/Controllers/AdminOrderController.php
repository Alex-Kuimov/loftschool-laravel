<?php

namespace App\Http\Controllers;

use App\Models\Orders;

class AdminOrderController extends Controller
{
    private $paginate = 10;

    public function index()
    {
        $orders = Orders::paginate($this->paginate);
        return view('admin/listOrder', ['orders' => $orders]);
    }
}
