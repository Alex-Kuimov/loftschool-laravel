<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CreateProduct extends Model
{
    protected $table='orders';

    public static function insertProduct($title, $category_id, $price, $image, $description)
    {
        self::insert([
            'title' => $title,
            'category_id' => $category_id,
            'price' => $price,
            'image' => $image,
            'description' => $description
        ]);
    }
}
