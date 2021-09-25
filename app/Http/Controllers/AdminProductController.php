<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class AdminProductController extends Controller
{
    public function index(Product $model)
    {
        $products = $model->all();
        return view('admin/listProduct', ['products' => $products]);
    }

    public function create(Request $request, Product $model)
    {
        if( count( $request->all() ) > 0 ) {

            $title = $request->input('title');
            $category_id = $request->input('category_id');
            $price = $request->input('price');
            $image = $request->input('image');
            $description = $request->input('description');

            $model->create([
                'title' => $title,
                'category_id' => $category_id,
                'price' => $price,
                'image' => $image,
                'description' => $description,
            ]);

            return redirect()->route('successfulAdmin');
        }

        return view('admin/createProduct');
    }

    public function edit($id, Product $model)
    {
        $product = $model->findOrFail($id);
        return view('admin/editProduct', [ 'product' => $product ] );
    }

    public function update(Request $request, Product $model)
    {
        $product = $model->findOrFail( $request->input('id' ) );
        $product->update( $request->all() );

        return redirect()->route('successfulAdmin');

    }

    public function destroy($id, Product $model)
    {
        $product = $model->findOrFail($id);
        $product->delete();
        return redirect()->route('successfulAdmin');
    }
}
