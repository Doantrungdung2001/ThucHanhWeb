<?php

use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\CategoryComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\SearchComponent;
use App\Http\Livewire\DetailComponent;
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

Route::get('/detail/{slug}', DetailComponent::class)->name('product.details');


//login and register
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');
});

//admin routes
Route::get('/admin', 'App\Http\Controllers\AdminController@show_dashboard')->middleware('admin');

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
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

    // User
    Route::prefix('user')->group(function () {
        Route::get('/all', [
            'as' => 'user.all',
            'uses' => 'App\Http\Controllers\UserController@all'
        ]);
        Route::get('/add', [
            'as' => 'user.add',
            'uses' => 'App\Http\Controllers\UserController@add'
        ]);
        Route::post('/store', [
            'as' => 'user.store',
            'uses' => 'App\Http\Controllers\UserController@store'
        ]);
        Route::get('/delete/{id}', [
            'as' => 'user.delete',
            'uses' => 'App\Http\Controllers\UserController@delete'
        ]);
        Route::get('/edit/{id}', [
            'as' => 'user.edit',
            'uses' => 'App\Http\Controllers\UserController@edit'
        ]);
        Route::post('/update/{id}', [
            'as' => 'user.update',
            'uses' => 'App\Http\Controllers\UserController@update'
        ]);
    });
});

//User Profile API 
Route::get('/user-info', [
    'as' => 'user.info',
    'uses'=> 'App\Http\Controllers\UserProfileController@showInfo'
]);

//CART - CHECKOUT - INVOICE
Route::get('/cart-home', 'App\Http\Controllers\CartsController@Index')->middleware('user');
Route::get('/detail/AddtoCart/{id}', 'App\Http\Controllers\CartsController@AddToCart')->middleware('user');
Route::get('/Delete-Item-Cart/{id}', 'App\Http\Controllers\CartsController@DeleteItemToCart')->middleware('user');
Route::get('/Delete-Item-Product/{id}', 'App\Http\Controllers\CartsController@DeleteItemListProduct')->middleware('user');
Route::get('/Cart', 'App\Http\Controllers\CartsController@ViewtoCart')->middleware('user');
Route::get('/same-product', 'App\Http\Controllers\CartsController@SameProduct')->middleware('user');
Route::get('/buy-again', 'App\Http\Controllers\CartsController@BuyAgain')->middleware('user');
Route::get('/Delete-Item-List-Cart/{id}', 'App\Http\Controllers\CartsController@DeleteItemListToCart')->middleware('user');
Route::get('/Save-Item-List-Cart/{id}/{quanty}', 'App\Http\Controllers\CartsController@SaveItemListToCart')->middleware('user');
Route::get('/Update-Item-List-Cart/{id}/{quanty}', 'App\Http\Controllers\CartController@UpdateItemListCart')->middleware('user');
Route::get('/Update-Total-Quantity', 'App\Http\Controllers\CartController@UpdateQuatityCart')->middleware('user');
Route::get('/AddtoCart1/{id}', 'App\Http\Controllers\CartsController@AddToCart1')->name('product.addToCart')->middleware('user');

//API
Route::get('/Api/Product-Cart', 'App\Http\Controllers\CartController@product_cart')->middleware('user');
Route::get('/Api/totalQuanty-Product-Cart', 'App\Http\Controllers\CartController@total_product_cart')->middleware('user');

//Invoice
Route::get('/create-invoice','App\Http\Controllers\InvoiceController@Invoice')->middleware('user');
Route::get('/payment','App\Http\Controllers\InvoiceController@SaveInvoice')->middleware('user');
Route::get('/update-invoice','App\Http\Controllers\CartsController@UpdateInvoice')->middleware('user');

//Payment
Route::get('/Sucess-payment','App\Http\Controllers\PaymentController@DonePayment')->middleware('user');
Route::post('/VN-pay-payment','App\Http\Controllers\PaymentController@VnpayPayment')->middleware('user');
Route::get('/Paypal-payment','App\Http\Controllers\PaymentController@PaypalPayment')->middleware('user');