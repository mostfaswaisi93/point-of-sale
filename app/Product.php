<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category_id', 'image', 'purchase_price', 'sale_price', 'stock',
    ];
}
