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

//login and register
Route::get('/login', 'App\Http\Controllers\LoginController@login');
Route::get('/register', 'App\Http\Controllers\LoginController@register');


//admin routes
Route::get('/dashboard', 'App\Http\Controllers\AdminController@show_dashboard');


// Category product
Route::prefix('category')->group(function () {
    Route::get('/all', [
        'as' => 'category.all',
        'uses' => 'App\Http\Controllers\CategoryController@all'
    ]);
    Route::get('/add', [
        'as' => 'category.add',
        'uses' => 'App\Http\Controllers\CategoryController@add'
    ]);
    Route::post('/store', [
        'as' => 'category.store',
        'uses' => 'App\Http\Controllers\CategoryController@store'
    ]);
    Route::get('/delete/{id}', [
        'as' => 'category.delete',
        'uses' => 'App\Http\Controllers\CategoryController@delete'
    ]);
    Route::get('/edit/{id}', [
        'as' => 'category.edit',
        'uses' => 'App\Http\Controllers\CategoryController@edit'
    ]);
    Route::post('/update/{id}', [
        'as' => 'category.update',
        'uses' => 'App\Http\Controllers\CategoryController@update'
    ]);
});


