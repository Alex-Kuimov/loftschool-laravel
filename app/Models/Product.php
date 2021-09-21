<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table='orders';

    public static function productFromBase($id)
    {
        return self::where('id', '=', $id)->get();
    }
}
