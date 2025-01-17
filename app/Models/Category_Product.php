<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category_Product extends Model
{
    /** @use HasFactory<\Database\Factories\Category_ProductFactory> */
    use HasFactory;
    use SoftDeletes;
    protected $guarded = [];
    public function products()
    {
        return $this->hasMany(Product::class, 'category_product_id');
    }
}