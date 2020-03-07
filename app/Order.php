<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table="order";
    protected $primaryKey="order_id";
    public $timestamps=false;

    public function store()
    {
        return $this->belongsTo("App\Shop");
    }

    public function detail()
    {
        return $this->hasMany("App\Order_Detail","order_id");
    }

    public function status()
    {
        return $this->hasOne("App\Order_Status","status_id","status_id");

    }

}
