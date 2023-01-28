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
});

//User Profile API 
Route::get('/user-info', [
    'as' => 'user.info',
    'uses'=> 'App\Http\Controllers\UserProfileController@showInfo'
]);

//CART - CHECKOUT - INVOICE
Route::get('/cart-home', 'App\Http\Controllers\CartsController@Index');
Route::get('/AddtoCart/{id}', 'App\Http\Controllers\CartsController@AddToCart');
Route::get('/Delete-Item-Cart/{id}', 'App\Http\Controllers\CartsController@DeleteItemToCart');
Route::get('/Cart', 'App\Http\Controllers\CartsController@ViewtoCart');
Route::get('/same-product', 'App\Http\Controllers\CartsController@SameProduct');
Route::get('/buy-again', 'App\Http\Controllers\CartsController@BuyAgain');
Route::get('/Delete-Item-List-Cart/{id}', 'App\Http\Controllers\CartsController@DeleteItemListToCart');
Route::get('/Save-Item-List-Cart/{id}/{quanty}', 'App\Http\Controllers\CartsController@SaveItemListToCart');
Route::get('/Update-Item-List-Cart/{id}/{quanty}', 'App\Http\Controllers\CartController@UpdateItemListCart');

Route::get('/AddtoCart1/{id}', 'App\Http\Controllers\CartsController@AddToCart1')->name('product.addToCart');

//API
Route::get('/Api/Product-Cart', 'App\Http\Controllers\CartController@product_cart');
Route::get('/Api/totalQuanty-Product-Cart', 'App\Http\Controllers\CartController@total_product_cart');

//Invoice
Route::get('/create-invoice','App\Http\Controllers\InvoiceController@Invoice');
Route::get('/payment','App\Http\Controllers\InvoiceController@SaveInvoice');

//Payment
Route::get('/Sucess-payment','App\Http\Controllers\PaymentController@DonePayment');
Route::post('/VN-pay-payment','App\Http\Controllers\PaymentController@VnpayPayment');
Route::get('/Paypal-payment','App\Http\Controllers\PaymentController@PaypalPayment');