<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "product";
    protected $primaryKey = "product_id";
    public $timestamps = false;

    public function images()
    {
        return $this->hasMany("App\Product_Image", "product_id");
    }

    public function store()
    {
        return $this->belongsTo("App\Store", "store_id");
    }

    public function category()
    {
        return $this->belongsTo("App\Product_Category","category_id");
    }
}
