<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Store;
use App\User;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::has("store")->get();
        foreach ($users as $key=>$data){
            $users[$key]["store"]=$users[$key]->store;
            $users[$key]["store"]['location']=$users[$key]->store->location;
        }
        return response()->json($users,200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public  function getNewStoreNotification(){
        $newStoreCount=Store::where("notification",0)->count();
        $stores=Store::where("notification",0)->get();
        foreach ($stores as $store){
            $store->notification=1;
            $store->save();
        }
        return  response()->json(["count"=>$newStoreCount],200);
    }
    public function approvalStore($id)
    {
        $store = Store::find($id);
        if ($store != null) {
            $store->approval == 0 ? $store->approval  = 1 : $store->approval = 1;
            if ($store->save()) {
                return response()->json(["message"=>"approvalSuccess"], 200);
            }
        }
        return response()->json("", 404);
    }
    public function blockStore($id)
    {
        $store = Store::find($id);
        if ($store != null) {
            $store->blocked == 1 ? $store->blocked = 0 : $store->blocked = 1;
            if ($store->save()) {
                return response()->json("", 200);
            }
        }
        return response()->json("", 404);
    }

}
