<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use Notifiable;
    public $timestamps=false;
    public function create_Token()
    {

        $token = Str::random(80);
        $this->api_token=$token;
        $this->save();
        return $token;
    }
//    public function deactive(){
//        $this->active==1?$this->active=0:$this->active=1;
//        $this->save();
//    }

    public function store()
    {
       return  $this->hasOne("App\Store","user_id");
    }

    public function cart()
    {
       return $this->hasOne("App\Cart","user_id");
    }

    public function location()
    {
        return $this->hasOne("App\Location",'location_id');

    }


}
