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



Auth::routes();
Route::group(['middleware'=>['web', 'auth']],function(){
    Route::get('/', 'HomeController@index');
    Route::resource('/orders','OrderController');
    Route::resource('/products','ProductController');
    Route::resource('/brands','BrandController');
    Route::resource('/productTypes','ProductTypeController');
    Route::resource('/customers','CustomerController');
});
