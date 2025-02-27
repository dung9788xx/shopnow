<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table="cart";
    protected $primaryKey="cart_id";
    public $timestamps=false;
    protected $fillable=["user_id"];

    public function user()
    {
        return $this->belongsTo("App\User");
    }

    public function detail()
    {
        return $this->hasMany("App\Cart_Detail","cart_id","cart_id");
    }
}
