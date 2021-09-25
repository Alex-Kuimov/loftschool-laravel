<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class DeleteProductController extends Controller
{
    public function deleteProduct(Request $request, Product $model)
    {
        $allProduct = $model::paginate(10);
        $submit = $request->input('submit');
        $id = $request->input('id');
        if (!empty($submit)) {
            $product = $model::find($id);
            $product->delete();
            return redirect()->route('successfulAdmin');
        }
        return view('admin/deleteProduct', [
            'allProduct' => $allProduct
        ]);
    }
}
