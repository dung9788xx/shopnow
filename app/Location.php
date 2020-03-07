<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $table="location";
    protected $primaryKey="location_id";
    public $timestamps=false;

    public function stores()
    {
        return $this->hasMany("App\Store","location_id");
    }
}
