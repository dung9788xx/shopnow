<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart_Detail extends Model
{
    protected $table="cart_detail";
    protected $primaryKey="cart_id";
    public $timestamps=false;

    public function cart()
    {
        return $this->belongsTo("App\Cart");
    }

    public function product()
    {
        return $this->hasOne("App\Product","product_id","product_id");

    }
}
