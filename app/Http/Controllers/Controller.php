<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use App\Product_Category;
use App\Province;
use App\Repositories\UserRepository;
use App\Store;
use App\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    private $userRepository;
    public function __construct(UserRepository $userRepository)
    {
       $this->userRepository=$userRepository;
    }
    public function index()
    {
        $users=User::has("store")->get();
        foreach ($users as $key=>$data){
            $users[$key]["store"]=$users[$key]->store;
            $users[$key]["location"]=$data->location;
            $users[$key]["location"]["province"]=$data->location->province;
            $users[$key]["location"]["district"]=$data->location->district;
            $users[$key]["location"]["ward"]=$data->location->ward;
        }
        return response()->json($users,200);
    }

}
