<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('login','AuthController@login');
//Forgot Password
Route::post('forgot/password', 'AuthController@forgot_password');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group(function(){
    Route::group(['prefix'=>'fetch'],function(){
        Route::get('categories','FetchController@categories');
        Route::get('sub_categories','FetchController@sub_categories');
        Route::get('products','FetchController@products');
    });
    
    Route::group(['prefix'=>'inventory'],function(){
        Route::post('add','StockController@addStock');
    });
    
    Route::group(['prefix'=>'sale'],function(){
        Route::post('create','SaleController@create');
        Route::get('summary','SaleController@beauty_advisor_summary');
        Route::get('region_wise', 'SaleController@region_wise_sale');

    });

    Route::group(['prefix'=>'ceo'], function() {
        Route::get('overal-sales','SaleController@overal_sales');
        Route::get('overal-category-wise-sale', 'SaleController@overal_category_wise_sale');
        Route::get('overal-region-sale', 'SaleController@region_wise_sale');
    });

});

Route::get('product-list', 'FetchController@products');
