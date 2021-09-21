<?php

namespace App\Http\Controllers;

use App\Models\CreateCategory;
use Illuminate\Http\Request;

class CreateCategoryController extends Controller
{
    public function createCategory(Request $request)
    {
        $error = [];
        if (!empty($request->input('title') && $request->input('description'))) {
            $title = $request->input('title');
            $description = $request->input('description');
            CreateCategory::insertCategory($title, $description);
            return redirect()->route('successfulAdmin');
        } else {
            if (!empty($request->input('submit'))) {
                $error[] = "Заполните все поля";
            }
        }
        return view('admin/createCategory', ['error' => $error]);
    }
}
