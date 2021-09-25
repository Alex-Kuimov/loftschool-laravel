<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class EditSelectCategoryController extends Controller
{
    public function editSelectCategory(Request $request, Category $model)
    {
        $id = $request->input('id');
        $changeCategory = $model::find($id);
        $changeTitle = $changeCategory->title;
        $changeDescription = $changeCategory->description;
        $changeId = $changeCategory->id;
        $error = [];
        if (!empty($request->input('title') && $request->input('description'))) {
            $title = $request->input('title');
            $description = $request->input('description');

            $category = $model::find($id);
            $category->title = $title;
            $category->description = $description;
            $category->save();

            return redirect()->route('successfulAdmin');
        } else {
            if (!empty($request->input('submit'))) {
                $error[] = "Заполните все поля";
            }
        }
        return view('admin/editSelectCategory', [
            'changeTitle' => $changeTitle,
            'changeDescription' => $changeDescription,
            'changeId' => $changeId,
            'error' => $error
        ]);
    }
}
