<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class DeleteCategoryController extends Controller
{
    public function deleteCategory(Request $request)
    {
        $allCategory = Category::selectCategory();
        $submit = $request->input('submit');
        $id = $request->input('id');
        if (!empty($submit)) {
            Category::deleteCategory($id);
            return redirect()->route('successfulAdmin');
        }
        return view('admin/deleteCategory', [
            'allCategory' => $allCategory
        ]);
    }
}
