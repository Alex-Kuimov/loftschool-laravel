<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeleteProduct extends Model
{
    protected $table='orders';

    public static function selectProduct()
    {
        return self::all();
    }

    public static function deleteProduct($id)
    {
        self::where('id', '=', $id)->delete();
    }
}
