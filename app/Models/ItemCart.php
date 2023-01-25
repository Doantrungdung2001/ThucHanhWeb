<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemCart extends Model
{
    use HasFactory;
    protected $table = 'item_carts';
    protected $fillable = [
        'id_user',
        'id_product',
        'name',
        'quanty',
        'size',
        'color',
        'price',
        'total_price',
        'image_url',
        'status',
    ];
}
