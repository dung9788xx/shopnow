<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    public $timestamps=false;

    public function create_Token()
    {

        $token = Str::random(80);
        $this->api_token=$token;
        $this->save();
        return $token;
    }
    public function deactive(){
        $this->active==1?$this->active=0:$this->active=1;
        $this->save();
    }

    public function store()
    {
       return  $this->hasOne("App\Store","user_id");
    }

    public function cart()
    {
       return $this->hasOne("App\Cart","user_id");
    }
}
