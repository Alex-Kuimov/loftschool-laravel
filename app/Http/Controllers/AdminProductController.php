<?php

namespace App\Http\Controllers;

use App\Models\Product;
use \App\Http\Requests\ProductRequest;

class AdminProductController extends Controller
{

    private $paginate = 10;

    public function index(Product $model)
    {
        $products = $model->paginate($this->paginate);
        return view('admin/listProduct', [ 'products' => $products ] );
    }

    public function show(Product $product)
    {
        return view('admin/editProduct', [ 'product' => $product ] );
    }

    public function create( ProductRequest $request, Product $product )
    {
        $validated = $request->validated();
        $product->create( $validated );

        $status = __('messages.created');

        return redirect()->action([AdminProductController::class, 'form'], [ 'product' => $product ])->with('status', $status);
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

        $status = __('messages.updated');

        return redirect()->action([AdminProductController::class, 'edit'], [ 'product' => $product ])->with('status', $status);
    }

    public function destroy($id, Product $model)
    {
        $product = $model->findOrFail($id);
        $product->delete();
        return redirect()->route('product.index');
    }
}
