<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EditCategory extends Model
{
    protected $table='category';

    public static function selectAllCategory()
    {
        return self::all();
    }
}
