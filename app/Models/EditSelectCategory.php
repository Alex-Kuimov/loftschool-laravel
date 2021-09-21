<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EditSelectCategory extends Model
{
    protected $table='category';

    public static function selectChangeCategory($id)
    {
        return self::select('*')->where('id', '=', $id)->get();
    }

    public static function updateChangeCategory($id, $title, $description)
    {
        self::where('id', '=', $id)->update([
            'title' => $title,
            'description' => $description
        ]);
    }
}
