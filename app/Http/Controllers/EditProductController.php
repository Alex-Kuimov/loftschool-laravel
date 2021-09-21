<?php

namespace App\Http\Controllers;

use App\Models\EditProduct;

use Illuminate\Http\Request;

class EditProductController extends Controller
{
    public function editProduct()
    {
        $allProduct = EditProduct::selectAllProduct();
        return view('admin/editProduct', ['allProduct' => $allProduct]);
    }
}
