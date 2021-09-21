<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CreateCategory extends Model
{
    protected $table='category';

    public static function insertCategory($title, $description)
    {
        self::insert([
            'title' => $title,
            'description' => $description
        ]);
    }
}
