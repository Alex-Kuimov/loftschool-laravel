<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EditSelectProduct extends Model
{
    protected $table='orders';

    public static function selectChangeProduct($id)
    {
        return self::select('*')->where('id', '=', $id)->get();
    }

    public static function updateChangeProduct($productId, $title, $category_id, $price, $image, $description)
    {
        self::where('id', '=', $productId)->update([
            'title' => $title,
            'category_id' => $category_id,
            'price' => $price,
            'image' => $image,
            'description' => $description
        ]);
    }
}
