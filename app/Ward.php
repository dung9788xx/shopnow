<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    protected $table="ward";
    protected $primaryKey="id";
    public $timestamps=false;
}
