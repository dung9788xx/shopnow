<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $table="district";
    protected $primaryKey="district_id";
    public $timestamps=false;

    public function wards()
    {
        return $this->hasMany("App\Ward","district_id");
    }

    public function province()
    {
        return $this->belongsTo("App\Province","province_id");
    }

}
