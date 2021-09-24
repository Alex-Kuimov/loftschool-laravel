<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Orders;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function orders(Request $request)
    {
        $category = $request->input('category');
        $id = $request->input('id');
        $orders = Orders::all();

        return view('orders', [
            'product' => $category,
            'id' => $id,
            'orders' => $orders
        ]);
    }
}
