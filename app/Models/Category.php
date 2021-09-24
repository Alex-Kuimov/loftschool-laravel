<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{

    protected $table='category';

    public static function CategoryFromDatabase()
    {
        return DB::table('category')->orderBy('title', 'asc')->get();
    }

    public static function OrdersFromCategory($id)
    {
        return DB::table('orders')->where('category_id', '=', $id)->get();
    }

    public static function insertCategory($title, $description)
    {
        self::insert([
            'title' => $title,
            'description' => $description
        ]);
    }

    public static function selectCategory()
    {
        return self::all();
    }

    public static function deleteCategory($id)
    {
        self::where('id', '=', $id)->delete();
    }

    public static function selectAllCategory()
    {
        return self::all();
    }

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
