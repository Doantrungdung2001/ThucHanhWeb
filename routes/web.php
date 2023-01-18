<?php

use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\CategoryComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\SearchComponent;
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

Route::get('/', HomeComponent::class);

Route::get('/shop', ShopComponent::class);

Route::get('/cart', CartComponent::class);

Route::get('/checkout', CheckoutComponent::class);

Route::get('/product-category/{category_slug}', CategoryComponent::class)->name('product.category');

Route::get('/search', SearchComponent::class)->name('product.search');

//login and register
Route::get('/login', array('as' => 'login', function () {
    return view('login');
}));

//admin routes
Route::get('/admin', 'App\Http\Controllers\AdminController@show_dashboard');

Route::prefix('admin')->group(function () {
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

    // Brand product
    Route::prefix('brand')->group(function () {
        Route::get('/all', [
            'as' => 'brand.all',
            'uses' => 'App\Http\Controllers\BrandController@all'
        ]);
        Route::get('/add', [
            'as' => 'brand.add',
            'uses' => 'App\Http\Controllers\BrandController@add'
        ]);
        Route::post('/store', [
            'as' => 'brand.store',
            'uses' => 'App\Http\Controllers\BrandController@store'
        ]);
        Route::get('/delete/{id}', [
            'as' => 'brand.delete',
            'uses' => 'App\Http\Controllers\BrandController@delete'
        ]);
        Route::get('/edit/{id}', [
            'as' => 'brand.edit',
            'uses' => 'App\Http\Controllers\BrandController@edit'
        ]);
        Route::post('/update/{id}', [
            'as' => 'brand.update',
            'uses' => 'App\Http\Controllers\BrandController@update'
        ]);
    });

    // Product
    Route::prefix('product')->group(function () {
        Route::get('/all', [
            'as' => 'product.all',
            'uses' => 'App\Http\Controllers\ProductController@all'
        ]);
        Route::get('/add', [
            'as' => 'product.add',
            'uses' => 'App\Http\Controllers\ProductController@add'
        ]);
        Route::post('/store', [
            'as' => 'product.store',
            'uses' => 'App\Http\Controllers\ProductController@store'
        ]);
        Route::get('/delete/{id}', [
            'as' => 'product.delete',
            'uses' => 'App\Http\Controllers\ProductController@delete'
        ]);
        Route::get('/edit/{id}', [
            'as' => 'product.edit',
            'uses' => 'App\Http\Controllers\ProductController@edit'
        ]);
        Route::post('/update/{id}', [
            'as' => 'product.update',
            'uses' => 'App\Http\Controllers\ProductController@update'
        ]);
    });
});
