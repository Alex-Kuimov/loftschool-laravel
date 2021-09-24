<?php

namespace App\Http\Controllers;

use App\Models\Product;

use Illuminate\Http\Request;

class EditProductController extends Controller
{
    public function editProduct()
    {
        $allProduct = Product::selectAllProduct();
        return view('admin/editProduct', ['allProduct' => $allProduct]);
    }
}
