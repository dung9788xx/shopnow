<?php

namespace App;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Cart_Detail extends Model
{
    protected $table="cart_detail";
    protected $fillable=["cart_id","product_id","quantity","price","note"];
    protected $primaryKey=["cart_id","product_id"];
    public $timestamps=false;
    public $incrementing=false;

    public function cart()
    {
        return $this->belongsTo("App\Cart");
    }

    public function product()
    {
        return $this->hasOne("App\Product","product_id","product_id");

    }

    protected function setKeysForSaveQuery(Builder $query)
    {
        $keys = $this->getKeyName();
        if(!is_array($keys)){
            return parent::setKeysForSaveQuery($query);
        }

        foreach($keys as $keyName){
            $query->where($keyName, '=', $this->getKeyForSaveQuery($keyName));
        }

        return $query;
    }

    protected function getKeyForSaveQuery($keyName = null)
    {
        if(is_null($keyName)){
            $keyName = $this->getKeyName();
        }

        if (isset($this->original[$keyName])) {
            return $this->original[$keyName];
        }

        return $this->getAttribute($keyName);
    }
}
