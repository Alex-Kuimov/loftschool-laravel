<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table='orders';

    public static function productFromBase($id)
    {
        return self::find($id);
    }

    public static function selectProduct()
    {
        return self::all();
    }

    public static function deleteProduct($id)
    {
        self::where('id', '=', $id)->delete();
    }

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

    public static function selectAllProduct()
    {
        return self::all();
    }

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
