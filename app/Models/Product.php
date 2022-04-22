<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'orders';
    protected $fillable = ['title', 'category_id', 'price', 'image', 'description'];
}
