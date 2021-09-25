<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Orders;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function orders(Request $request, Orders $model)
    {
        $category = $request->input('category');
        $id = $request->input('id');
        $orders = $model->all();

        return view('orders', [
            'product' => $category,
            'id' => $id,
            'orders' => $orders
        ]);
    }

    public function index(Category $model)
    {
        $categories = $model->all();
        return view('admin/listCategory', ['categories' => $categories]);
    }


    public function create(Request $request, Category $model)
    {
        if( count( $request->all() ) > 0 ) {

            $title = $request->input('title');
            $description = $request->input('description');

            $model->create([
                'title' => $title,
                'description' => $description,
            ]);

            return redirect()->route('successfulAdmin');
        }

        return view('admin/createCategory');
    }

    public function edit($id, Category $model)
    {
        $category = $model->findOrFail($id);
        return view('admin/editCategory', [ 'category' => $category ] );
    }

    public function update(Request $request, Category $model)
    {
        $category = $model->findOrFail( $request->input('id' ) );
        $category->update( $request->all() );

        return redirect()->route('successfulAdmin');

    }

    public function destroy($id, Category $model)
    {
        $category = $model->findOrFail($id);
        $category->delete();
        return redirect()->route('successfulAdmin');
    }

}
