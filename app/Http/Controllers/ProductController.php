<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function show($id, Product $model)
    {
        $product = $model->findOrFail($id);
        return view('product', [ 'product' => $product ] );
    }
}
