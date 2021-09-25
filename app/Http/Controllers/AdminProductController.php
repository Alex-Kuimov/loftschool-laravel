<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;
use \App\Http\Requests\ProductRequest;

class AdminProductController extends Controller
{
    public function index(Product $model)
    {
        $products = $model->all();
        return view('admin/listProduct', [ 'products' => $products ] );
    }

    public function show(ProductRequest $request, Product $model)
    {
        $product = $model->findOrFail( $request->id );
        return view('admin/editProduct', [ 'product' => $product ] );
    }

    public function create( ProductRequest $request, Product $model )
    {
        $validated = $request->validated();
        $model->create( $validated );
        return redirect()->route('product.index');
    }

    public function form(){
        return view('admin/createProduct');
    }

    public function edit($id, Product $model)
    {
        $product = $model->findOrFail($id);
        return view('admin/editProduct', [ 'product' => $product ] );
    }

    public function update(ProductRequest $request, Product $model)
    {
        $validated = $request->validated();
        $product = $model->findOrFail( $request->id );
        $product->update( $validated );

        return redirect()->route( 'product.edit', $request->id );
    }

    public function destroy($id, Product $model)
    {
        $product = $model->findOrFail($id);
        $product->delete();
        return redirect()->route('product.index');
    }
}
