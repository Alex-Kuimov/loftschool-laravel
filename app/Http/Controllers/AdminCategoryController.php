<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use \App\Http\Requests\CategoryRequest;

class AdminCategoryController extends Controller
{

    public function index(Category $model)
    {
        $categories = $model->all();
        return view('admin/listCategory', ['categories' => $categories]);
    }

    public function show(CategoryRequest $request, Product $model)
    {
        $category = $model->findOrFail( $request->id );
        return view('admin/editCategory', [ 'category' => $category ] );
    }


    public function create(CategoryRequest $request, Category $model)
    {
        $validated = $request->validated();
        $model->create( $validated );
        return redirect()->route('category.index');
    }

    public function form(){
        return view('admin/createCategory');
    }

    public function edit($id, Category $model)
    {
        $category = $model->findOrFail($id);
        return view('admin/editCategory', [ 'category' => $category ] );
    }

    public function update(CategoryRequest $request, Category $model)
    {
        $validated = $request->validated();
        $category = $model->findOrFail( $request->id );
        $category->update( $validated );

        return redirect()->route( 'category.edit', $request->id );
    }

    public function destroy($id, Category $model)
    {
        $category = $model->findOrFail($id);
        $category->delete();
        return redirect()->route('successfulAdmin');
    }

}
