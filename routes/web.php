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

// Route::get('/index', function() {
//     return view("index");
// });


// products 
Route::get('/all-products', 'ProductController@allProducts');
Route::get('/add-products-form', 'ProductController@addProductForm');
Route::post('/add-products', 'ProductController@addProduct');
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
// cities
Route::get('/all-cities', 'CityController@cities')->name('city.index');
Route::get('/add-city-form', 'CityController@createCityForm');
Route::post('/add-city', 'CityController@createCity');
// beauty girls
Route::get('/all-ba-girls', 'BeautyAdvisorController@beautyAdvisors')->name('beauty-advisors');
Route::get('/beauty-advisors', 'BeautyAdvisorController@createBeautyAdvisorForm');
Route::post('/create-beauty-advisors', 'BeautyAdvisorController@createBeautyAdvisor');
Route::get('/assign-store-to-beauty-advisor-form', 'BeautyAdvisorController@AssignStoreToBeautyAdvisorForm');
Route::post('/assign-store-to-beauty-advisor', 'BeautyAdvisorController@AssignStoreToBeautyAdvisor');
Route::post('/deactivate-ba', 'BeautyAdvisorController@deactivate_ba');
// categories
Route::get('/all-categories', 'CategoryController@allCategories');
Route::get('/add-category-form', 'CategoryController@addCategoryForm');
Route::get('/add-category', 'CategoryController@addCategory');
// sub sub-categories
Route::get('/all-sub-categories', 'CategoryController@allSubCategories');
Route::get('/add-sub-category-form', 'CategoryController@addSubCategoryForm');
Route::get('/add-sub-category', 'CategoryController@addSubCategory');

//Sales Pending
Route::get('/pending/sales', 'ProductController@pending_sales')->name('pending_sales');
Route::get('/approved/sales', 'ProductController@approved_sales')->name('sales.pending');





