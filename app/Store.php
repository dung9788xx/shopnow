<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $table = "store";
    protected $primaryKey = "store_id";
    public $timestamps = false;
    protected $fillable=["name","description","user_id","approval","notification"];

    public function User()
    {
        return $this->belongsTo("App\User");
    }

    public function products()
    {
        return $this->hasMany("App\Product","store_id");
    }



    public function orders()
    {
        return $this->hasMany("App\Order","store_id");
    }
}
