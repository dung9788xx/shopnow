<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $table="location";
    protected $primaryKey="location_id";
    protected $fillable=['province_id','district_id','ward_id','street'];
    public $timestamps=false;

    public function province()
    {
        return $this->hasOne("App\Province","province_id","province_id");
    }

    public function district()
    {
        return $this->hasOne("App\District","district_id","district_id");
    }

    public function ward()
    {
        return $this->hasOne("App\Ward","id","ward_id");
    }
}
