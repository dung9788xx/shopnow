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
    Route::middleware(['auth:api','checkActive'],['except'=>["user"]])->group(function () {
        Route::get('/user/deactive/{id}',"UserController@deactive")->middleware("can:deactive_user");
        Route::get("/store/getNewStoreNotification","StoreController@getNewStoreNotification");
        Route::get("/store/approvalStore/{id}","StoreController@approvalStore");
        Route::get("/store/blockStore/{id}","StoreController@blockStore");
        Route::get("/store/getOrders","StoreController@getOrders");
        Route::get("/store/getProductById/{id}","StoreController@getProductById");
        Route::apiResource("store","StoreController");
        Route::get("/order/getNewOrderNotification","OrderController@getNewOrderNotification");
        Route::get("/order/getOrderByUser","OrderController@getOrderByUser");
        Route::get("/order/getOrderDetail/{id}","OrderController@getOrderDetail");
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
        Route::post('/cart/placeOrder',"CartController@placeOrder");
        Route::get('/cart/getShippingInfo',"CartController@getShippingInfo");
        Route::apiResource("cart","CartController");
    });
    Route::apiResource("user", "UserController");
    Route::post('login', "LoginController@login");
    Route::get('/province/getProvince',"AddressController@getProvine");
    Route::get('/province/getDistrictByProvince/{id}',"AddressController@getDistrictByProvince");
    Route::get('/province/getWardByDistrict/{id}',"AddressController@getWardByDistrict");
    Route::get('/getThumbImage/{id}',"ImageController@getThumbImage");

});
