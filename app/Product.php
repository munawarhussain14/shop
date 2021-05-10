<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "product";
    protected $fillable = [
        "name",
        "desc",
        "flavor",
        "size",
        "case_size",
        "measure_unit_id",
        "qty",
        "price",
        "sales_price",
        "special_price",
        "special_price_from",
        "special_price_to",
        "inStock",
        "grocery_type",
        "price_date",
        "image_url",
        "available_from",
        "available_to",
        "brand_id",
        "cat_id",
        "store_id",
    ];
}
