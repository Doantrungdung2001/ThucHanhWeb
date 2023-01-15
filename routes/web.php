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

//login and register
// Route::get('/login', 'App\Http\Controllers\LoginController@login');
// Route::get('/register', 'App\Http\Controllers\LoginController@register');
// Route::get('/', function() {
//     return view('index');
// });

Route::get('/',HomeComponent::class);

Route::get('/shop',ShopComponent::class);

Route::get('/cart',CartComponent::class);

Route::get('/checkout', CheckoutComponent::class);

Route::get('/product-category/{category_slug}', CategoryComponent::class)->name('product.category');

Route::get('/search', SearchComponent::class)->name('product.search');

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });

// //admin routes
// Route::get('/dashboard', 'App\Http\Controllers\AdminController@show_dashboard');


// // Category product
// Route::get('/add_category_product', 'App\Http\Controllers\CategoryProduct@add_category_product');
// Route::get('/all_category_product', 'App\Http\Controllers\CategoryProduct@all_category_product');

