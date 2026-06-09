<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'price', 'discount_price', 'quantity', 'sku', 'barcode',
        'weight', 'size', 'material', 'color', 'slug', 'description',
        'image', 'video', 'status', 'sub_category_id', 'shop_id', 'user_id'
    ];

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
