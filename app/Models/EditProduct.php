<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EditProduct extends Model
{
    protected $table='orders';

    public static function selectAllProduct()
    {
        return self::all();
    }
}
