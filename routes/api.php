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
    Route::middleware('auth:api')->group(function () {
        Route::get('/user/deactive/{id}',"UserController@deactive")->middleware("can:deactive_user");
        Route::apiResource("user", "UserController");
        Route::get("/store/getNewStoreNotification","StoreController@getNewStoreNotification");
        Route::get("/store/approvalStore/{id}","StoreController@approvalStore");
        Route::get("/store/blockStore/{id}","StoreController@blockStore");
        Route::get("/store/getOrders","StoreController@getOrders");
        Route::get("/store/getProductById/{id}","StoreController@getProductById");
        Route::apiResource("store","StoreController");
        Route::get("/order/getNewOrderNotification","OrderController@getNewOrderNotification");
        Route::apiResource("order","OrderController");
        Route::get('/product/getImageById/{id}',"ProductController@getImageById");
        Route::get('/product/getProductByName/{name}',"ProductController@getProductByName");
        Route::get('/product/getProductByCategory/{id}',"ProductController@getProductByCategory");
        Route::get('/product/getProductForSlider',"ProductController@getProductForSlider");
        Route::get('/product/deactive/{id}', "ProductController@deavtive");
        Route::apiResource("product","ProductController");
        Route::apiResource("category","CategoryController");
        Route::get('/cart/getCartByUserId', "CartController@getCartByUserId");
        Route::post('/cart/updateCart', "CartController@updateCart");
        Route::post('/cart/addProductToCart', "CartController@addProductToCart");
        Route::apiResource("cart","CartController");
    });
    Route::post('login', "LoginController@login");

});
