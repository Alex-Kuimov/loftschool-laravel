<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EditSelectCategory;

class EditSelectCategoryController extends Controller
{
    public function editSelectCategory(Request $request)
    {
        $id = $request->input('id');
        $changeCategory = EditSelectCategory::selectChangeCategory($id);
        $changeTitle = $changeCategory['0']->title;
        $changeDescription = $changeCategory['0']->description;
        $changeId = $changeCategory['0']->id;
        $error = [];
        if (!empty($request->input('title') && $request->input('description'))) {
            $title = $request->input('title');
            $description = $request->input('description');
            $categoryId = $request->input('id');
            EditSelectCategory::updateChangeCategory($categoryId, $title, $description);
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
