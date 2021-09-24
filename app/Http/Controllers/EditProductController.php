<?php

namespace App\Http\Controllers;

use App\Models\Product;

use Illuminate\Http\Request;

class EditProductController extends Controller
{
    public function editProduct()
    {
        $allProduct = Product::all();
        return view('admin/editProduct', ['allProduct' => $allProduct]);
    }
}
