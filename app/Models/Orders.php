<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table = 'buy';

    public static function selectOrders()
    {
        return self::all();
    }
}
