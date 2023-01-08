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
    return view('index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

#trang ca nhan
Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'profile'])->name('profile');
# doi mk 
Route::get('/change-password', [App\Http\Controllers\ProfileController::class, 'changePassword'])->name('change-password');
Route::post('/change-password', [App\Http\Controllers\ProfileController::class, 'validatePassword'])->name('validate-password');
# xac nhan mail khi thay mk
Route::get('/confirm-otp', [App\Http\Controllers\ProfileController::class, 'confirmOTPform'])->name('confirm-otp');
Route::post('/confirm-otp', [App\Http\Controllers\ProfileController::class, 'validateOtp'])->name('validate-otp');
# doi mail
#Route::get('/change-email', [App\Http\Controllers\ProfileController::class, 'changeEmail'])->name('change-email');


