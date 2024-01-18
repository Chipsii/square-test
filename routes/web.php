<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChargeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/charge', [ChargeController::class, 'createCharge']);

// Route::prefix('merchant')->group(function () {
//     Route::get('/{marchant}/charge', 'ChargeController@chargeWithMerchant');
//     Route::get('/{marchant}/customer/{customer}/charge', 'ChargeController@chargeWithMerchantAndCustomer');
// });

// Route::group(['prefix' => 'customer'], function () {
//     Route::get('/create', 'ChargeController@createCustomer');
//     Route::get('/{customer}/charge', 'ChargeController@chargeWithCustomer');
// });
