<?php

namespace App\Http\Controllers;

use App\Models\Category;
use \App\Http\Requests\CategoryRequest;

class AdminCategoryController extends Controller
{
    private $paginate = 10;

    public function index(Category $model)
    {
        $categories = $model->paginate($this->paginate);
        return view('admin/listCategory', ['categories' => $categories]);
    }

    public function show(Category $category)
    {
        return view('admin/editCategory', [ 'category' => $category ] );
    }


    public function create(CategoryRequest $request, Category $category)
    {
        $validated = $request->validated();
        $category->create( $validated );

        $status = __('messages.created');

        return redirect()->action([AdminCategoryController::class, 'form'], [ 'category' => $category ])->with('status', $status);
    }

    public function form(){
        return view('admin/createCategory');
    }

    public function edit(Category $category)
    {
        return view('admin/editCategory', [ 'category' => $category ] );
    }

    public function update(CategoryRequest $request, Category $model)
    {
        $validated = $request->validated();
        $category = $model->findOrFail( $request->id );
        $category->update( $validated );

        $status = __('messages.updated');

        return redirect()->action([AdminCategoryController::class, 'edit'], [ 'category' => $category ])->with('status', $status);
    }

    public function destroy($id, Category $model)
    {
        $category = $model->findOrFail($id);
        $category->delete();
        return redirect()->route('category.index');
    }

}
