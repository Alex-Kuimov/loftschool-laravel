<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class DeleteCategoryController extends Controller
{
    public function deleteCategory(Request $request)
    {
        $allCategory = Category::all();
        $submit = $request->input('submit');
        $id = $request->input('id');
        if (!empty($submit)) {
            $category = Category::find($id);
            $category->delete();

            return redirect()->route('successfulAdmin');
        }
        return view('admin/deleteCategory', [
            'allCategory' => $allCategory
        ]);
    }
}
