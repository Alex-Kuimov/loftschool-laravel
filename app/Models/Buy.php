<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Buy extends Model
{
    protected $table = 'buy';
    protected $fillable = ['product_id', 'email', 'name'];

    public static function productFromOrders($id)
    {
        return DB::table('orders')->where('id', '=', $id)->get();
    }

}
