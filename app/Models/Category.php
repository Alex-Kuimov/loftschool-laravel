<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{

    public static function CategoryFromDatabase()
    {
        return DB::table('category')->orderBy('title', 'asc')->get();
    }

    public static function OrdersFromCategory($id)
    {
        return DB::table('orders')->where('category_id', '=', $id)->get();
    }

}
