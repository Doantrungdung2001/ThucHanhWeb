<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public function colors() {
        return $this->hasMany(ProductColor::class, 'productId');
    }
    public function sizes() {
        return $this->hasMany(ProductSize::class, 'productId');
    }

    public function category() {
        return $this->belongsTo(Category::class, 'categoryId');
    }

    public function brand() {
        return $this->belongsTo(Brand::class, 'brandId');
    }
}
