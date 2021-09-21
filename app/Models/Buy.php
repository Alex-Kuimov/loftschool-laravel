<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Buy extends Model
{
    public static function productFromOrders($id)
    {
        return DB::table('orders')->where('id', '=', $id)->get();
    }

    public static function orderInsert($product_id, $email, $name)
    {
        DB::table('buy')->insert(
            ['product_id' => $product_id,
                'email' => $email,
                'name' => $name
            ]);
    }

}
