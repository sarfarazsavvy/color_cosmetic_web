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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group(function(){
    Route::group(['prefix'=>'fetch'],function(){
        Route::get('categories','FetchController@categories');
        Route::get('sub_categories','FetchController@sub_categories');
        Route::get('products','FetchController@products');
    });
});

Route::get('product-list', 'FetchController@products');
