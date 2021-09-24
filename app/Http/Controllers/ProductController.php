<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function product(Request $request)
    {
        $id = $request->input("id");
        $order = Product::find($id);
        return view('product', ['order' => $order, 'id' => $id]);
    }
}
