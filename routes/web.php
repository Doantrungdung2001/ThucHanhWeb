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


//admin routes
Route::get('/dashboard', 'App\Http\Controllers\AdminController@show_dashboard');


// Category product
Route::get('/add_category_product', 'App\Http\Controllers\CategoryProduct@add_category_product');
Route::get('/all_category_product', 'App\Http\Controllers\CategoryProduct@all_category_product');
