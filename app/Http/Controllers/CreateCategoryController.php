<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CreateCategoryController extends Controller
{
    public function createCategory(Request $request, Category $model)
    {
        $error = [];
        if (!empty($request->input('title') && $request->input('description'))) {

            $validated = $request->validate([
                'title' => 'required',
                'description ' => 'required',
            ]);

            $title = $request->input('title');
            $description = $request->input('description');

            $model::create([
                'title' => $title,
                'description' => $description,
            ]);

            return redirect()->route('successfulAdmin');
        } else {
            if (!empty($request->input('submit'))) {
                $error[] = "Заполните все поля";
            }
        }
        return view('admin/createCategory', ['error' => $error]);
    }
}
