<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_Detail extends Model
{
    protected $table="order_detail";
    protected $primaryKey="order_id";
    public $timestamps=false;
    public function order()
    {
        return $this->belongsTo("App\Order");
    }

    public function product()
    {
        return $this->hasOne("App\Product","product_id","product_id");

    }
}
