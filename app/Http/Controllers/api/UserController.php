<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Location;
use App\Store;
use App\User;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Psy\Util\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware(["auth:api", 'checkActive'], ['except' => ['store']]);
    }

    public function index()
    {
        $users = User::where("level", "!=", 2)->get();
        foreach ($users as $key => $data) {
            $users[$key]["location"] = $data->location;
            $users[$key]["location"]["province"] = $data->location->province;
            $users[$key]["location"]["district"] = $data->location->district;
            $users[$key]["location"]["ward"] = $data->location->ward;

        }
        return response()->json($users, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (User::where("username", "=", \request("username"))->count() > 0) {
            return response()->json("Tên tài khoản đã tồn tài!", 403);
        } else {
           if(\request("level")==2){
               if(Store::where("name","=",\request("storeName"))->count()>0){
                   return response()->json("Tên cửa hàng đã tồn tài!", 403);
               }else{
                   $ar = $request->toArray();
                   $ar["password"] = Hash::make($ar["password"]);
                   $user = new User($ar);
                   $location = new Location($request->toArray());
                   $location->save();
                   $user->location_id = $location->location_id;
                   $user->save();
                   $store=new Store(["name"=>\request("storeName"),"description"=>\request("description"),
                       "user_id"=>$user->id]);
                   $store->save();
                   return response()->json("OK", 200);
               }
           }else{
               $ar = $request->toArray();
               $ar["password"] = Hash::make($ar["password"]);
               $user = new User($ar);
               $location = new Location($request->toArray());
               $location->save();
               $user->location_id = $location->location_id;
               $user->save();
               return response()->json("OK", 200);
           }
        }

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users = User::find($id);
        $users["location"] = $users->location;
        $users["location"]["province"] = $users->location->province;
        $users["location"]["district"] = $users->location->district;
        $users["location"]["ward"] = $users->location->ward;

        return response()->json($users, 200);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        if (Auth::user()->can("delete", User::find($id))) {
            User::find($id)->delete();
        } else {
            return response()->json(['error' => 'Unauthors'], 401);
        }
    }

    public function deactive($id)
    {
        $user = User::find($id);
        if ($user != null) {
            $user->active == 1 ? $user->active = 0 : $user->active = 1;
            if ($user->save()) {
                return response()->json("", 200);
            }
        }
        return response()->json("", 404);

    }


}
