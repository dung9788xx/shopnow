<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_Image extends Model
{
    protected $fillable=["image_name"];
    protected $table="product_image";
    protected $primaryKey="image_id";
    public $timestamps=false;

    public function product()
    {
        return $this->belongsTo("App\Product","product_id");
    }

}
