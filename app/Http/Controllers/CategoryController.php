<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function orders(Request $request)
    {
        $category = $request->input('category');
        $id = $request->input('id');
        $orders = Category::OrdersFromCategory($id);
        return view('orders', [
            'product' => $category,
            'id' => $id,
            'orders' => $orders
        ]);
    }
}
