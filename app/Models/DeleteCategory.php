<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeleteCategory extends Model
{
    protected $table='category';

    public static function selectCategory()
    {
        return self::all();
    }

    public static function deleteCategory($id)
    {
        self::where('id', '=', $id)->delete();
    }
}
