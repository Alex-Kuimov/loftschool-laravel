<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DeleteCategory;

class DeleteCategoryController extends Controller
{
    public function deleteCategory(Request $request)
    {
        $allCategory = DeleteCategory::selectCategory();
        $submit = $request->input('submit');
        $id = $request->input('id');
        if (!empty($submit)) {
            DeleteCategory::deleteCategory($id);
            return redirect()->route('successfulAdmin');
        }
        return view('admin/deleteCategory', [
            'allCategory' => $allCategory
        ]);
    }
}
