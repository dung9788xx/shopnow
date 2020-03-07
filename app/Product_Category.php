<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_Category extends Model
{
    protected $table="product_category";
    protected $primaryKey="category_id";
    public $timestamps=false;

    public function products()
    {
        return $this->hasMany("App\Product","category_id");
    }
}
