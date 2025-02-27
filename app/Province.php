<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $table="province";
    public $timestamps=false;
    protected $primaryKey="province_id";

    public function districts()
    {
        return $this->hasMany("App\District","province_id");
    }

    public function location()
    {
        return $this->belongsTo("App\Location","location_id","location_id");
    }
}
