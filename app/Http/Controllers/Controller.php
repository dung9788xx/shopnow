<?php

namespace App\Http\Controllers;

use App\Product;
use App\Product_Category;
use App\Store;
use App\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        $rp=Storage::deleteDirectory("public/productimage/5/");
        if(Storage::exists("public/productimage/5/")){
            echo "ok";
        }else echo 'no';
        dd($rp);
    }

}
