<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class EditSelectProductController extends Controller
{
    public function editSelectProduct(Request $request)
    {

        $id = $request->input('id');
        $changeProduct = Product::find($id);

        $change = [];
        $change[] = $changeProduct->title;
        $change[] = $changeProduct->price;
        $change[] = $changeProduct->category_id;
        $change[] = $changeProduct->image;
        $change[] = $changeProduct->description;
        $change[] = $changeProduct->id;
        $error = [];
        $product = [];
        $input = $request->except('submit');

        if (!empty($request->input('submit'))) {
            foreach ($input as $value) {
                if (!empty($value)) {
                    $product[] = $value;
                } else {
                    $error[] = "Заполните все поля";
                }
            }
        }
        if (count($product) == 7) {
            $title = $product['1'];
            $category_id = $product['2'];
            $price = $product['3'];
            $image = $product['4'];
            $description = $product['5'];

            $product = Product::find($id);
            $product->title = $title;
            $product->category_id = $category_id;
            $product->price = $price;
            $product->image = $image;
            $product->description = $description;
            $product->save();

            return redirect()->route('successfulAdmin');
        }
        return view('admin/editSelectProduct', [
            'change' => $change,
            'error' => $error
        ]);
    }
}
