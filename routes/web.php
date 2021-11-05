<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('home');
});

Auth::routes();
Route::group(['middleware'=>'auth'],function(){
    Route::get('/home', 'HomeController@index')->name('home');
});

// changePasswordRequestList
Route::get('/forgot/password', 'BeautyAdvisorController@changePasswordRequestList')->name('forgot.password');

Route::get('/all-products', 'ProductController@allProducts')->name('product.index');
Route::get('/add-products-form', 'ProductController@addProductForm');
Route::post('/add-products', 'ProductController@addProduct')->name('add.product');
Route::get('/edit/product/{id}', 'ProductController@edit')->name('edit');
Route::post('/update/product/{id}', 'ProductController@update')->name('update.product');
Route::get('/remove/product/{id}', 'ProductController@destroy')->name('remove.product');

// categories
Route::post('/add-category', 'CategoryController@addCategory');
Route::post('/add-sub-category', 'CategoryController@addSubCategory');
Route::post('/delete-category', 'CategoryController@deleteCategory');
// stores
Route::get('/all-stores', 'StoreController@stores');
Route::get('/add-store-form', 'StoreController@createStoreForm');
Route::post('/add-store', 'StoreController@createStore');
Route::get('/store-stock/{id}', 'StoreController@storeStock')->name('store-stock');
Route::post('/add-products-to-store', 'StoreController@AddProductsToStore');
Route::post('/update-store-stock', 'StoreController@updateStoreStock');
Route::post('/update-store', 'StoreController@updateStore');
// cities

Route::resource('/city', 'CityController');
Route::resource('/category', 'CategoryController');
Route::resource('/sub_category', 'SubCategoryController');


// beauty girls
Route::get('/all-ba-girls', 'BeautyAdvisorController@beautyAdvisors')->name('beauty-advisors');
Route::get('/beauty-advisors', 'BeautyAdvisorController@createBeautyAdvisorForm');
Route::post('/create-beauty-advisors', 'BeautyAdvisorController@createBeautyAdvisor');
Route::get('/assign-store-to-beauty-advisor-form', 'BeautyAdvisorController@AssignStoreToBeautyAdvisorForm');
Route::post('/assign-store-to-beauty-advisor', 'BeautyAdvisorController@AssignStoreToBeautyAdvisor');
Route::post('/deactivate-ba', 'BeautyAdvisorController@deactivateBa');

//Sales Pending
Route::get('/pending/sales', 'ProductController@pending_sales')->name('pending_sales');
Route::post('/approved/sales', 'ProductController@approved_sales')->name('sales.pending');

Route::get('/ba/sales/reports', 'ProductController@ba_sales_reports')->name('ba.sales.reports');
Route::get('/ba/sales/view/{id}', 'ProductController@ba_sales_view')->name('ba.sales.view');





