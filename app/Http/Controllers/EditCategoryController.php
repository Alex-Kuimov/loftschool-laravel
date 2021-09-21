<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EditCategory;

class EditCategoryController extends Controller
{
    public function editCategory()
    {
        $allCategory = EditCategory::selectAllCategory();
        return view('admin/editCategory', ['allCategory' => $allCategory]);
    }
}
