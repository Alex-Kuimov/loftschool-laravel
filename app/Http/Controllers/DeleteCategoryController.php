<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class DeleteCategoryController extends Controller
{
    public function deleteCategory(Request $request, Category $model)
    {
        $allCategory = $model->paginate(10);
        $submit = $request->input('submit');
        $id = $request->input('id');
        if (!empty($submit)) {
            $category = $model->find($id);
            $category->delete();

            return redirect()->route('successfulAdmin');
        }
        return view('admin/deleteCategory', [
            'allCategory' => $allCategory
        ]);
    }
}
