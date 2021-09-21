<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DeleteProduct;

class DeleteProductController extends Controller
{
    public function deleteProduct(Request $request)
    {
        $allProduct = DeleteProduct::selectProduct();
        $submit = $request->input('submit');
        $id = $request->input('id');
        if (!empty($submit)) {
            DeleteProduct::deleteProduct($id);
            return redirect()->route('successfulAdmin');
        }
        return view('admin/deleteProduct', [
            'allProduct' => $allProduct
        ]);
    }
}
