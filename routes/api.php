<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::namespace("api")->group(function () {
//    Route::middleware('auth:api')->group(function () {
        Route::get('/user/deactive/{id}',"UserController@deactive")->middleware("can:deactive_user");
        Route::apiResource("user", "UserController");
        Route::get("/store/getNewStoreNotification","StoreController@getNewStoreNotification");
        Route::get("/store/approvalStore/{id}","StoreController@approvalStore");
        Route::get("/store/blockStore/{id}","StoreController@blockStore");
        Route::get("/store/getOrders","StoreController@getOrders");
        Route::apiResource("store","StoreController");
        Route::apiResource("order","OrderController");
        Route::apiResource("product","ProductController");
        Route::apiResource("category","CategoryController");
//    });
    Route::post('login', "LoginController@login");

});
