<?php

namespace App\Http\Controllers;

use App\Models\CreateProduct;
use Illuminate\Http\Request;

class CreateProductController extends Controller
{

    public function createProduct(Request $request)
    {
        $error = [];
        if (!empty($request->input('title') && $request->input('category_id'))
            && $request->input('price') && $request->input('image')
            && $request->input('description')) {
            $title = $request->input('title');
            $category_id = $request->input('category_id');
            $price = $request->input('price');
            $image = $request->input('image');
            $description = $request->input('description');
            CreateProduct::insertProduct($title, $category_id, $price, $image, $description);
            return redirect()->route('successfulAdmin');
        } else {
            if (!empty($request->input('submit'))) {
                $error[] = "Заполните все поля";
            }
        }
        return view('admin/createProduct', ['error' => $error]);
    }
}
