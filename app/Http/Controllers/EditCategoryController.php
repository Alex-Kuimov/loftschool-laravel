<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class EditCategoryController extends Controller
{
    public function editCategory()
    {
        $allCategory = Category::all();
        return view('admin/editCategory', ['allCategory' => $allCategory]);
    }
}
