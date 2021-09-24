<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class EditSelectProductController extends Controller
{
    public function editSelectProduct(Request $request)
    {
        $id = $request->input('id');
        $changeProduct = Product::selectChangeProduct($id);
        $change = [];
        $change[] = $changeProduct['0']->title;
        $change[] = $changeProduct['0']->price;
        $change[] = $changeProduct['0']->category_id;
        $change[] = $changeProduct['0']->image;
        $change[] = $changeProduct['0']->description;
        $change[] = $changeProduct['0']->id;
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
            $productId = $product['6'];
            Product::updateChangeProduct($productId, $title, $category_id, $price, $image, $description);
            return redirect()->route('successfulAdmin');
        }
        return view('admin/editSelectProduct', [
            'change' => $change,
            'error' => $error
        ]);
    }
}
