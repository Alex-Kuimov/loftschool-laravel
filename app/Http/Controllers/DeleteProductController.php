<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class DeleteProductController extends Controller
{
    public function deleteProduct(Request $request)
    {
        $allProduct = Product::all();
        $submit = $request->input('submit');
        $id = $request->input('id');
        if (!empty($submit)) {
            $product = Product::find($id);
            $product->delete();
            return redirect()->route('successfulAdmin');
        }
        return view('admin/deleteProduct', [
            'allProduct' => $allProduct
        ]);
    }
}
