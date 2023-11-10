<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
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

Route::middleware(['guestOrVerified'])->group(function () {
    Route::get('/', [ProductController::class, 'index']);
    Route::get('/product/{product:slug}', [ProductController::class, 'details']);

    Route::prefix('/cart')->group(function () {
        Route::get('/', [CartController::class, 'index']);
        Route::post('/add/{product:slug}', [CartController::class, 'add']);
        Route::post('/remove/{product:slug}', [CartController::class, 'remove']);
        Route::post('/update-quantity/{product:slug}', [CartController::class, 'updateQuantity']);
    });
});

Route::middleware(['auth', 'verified'])->group(function() {
    Route::get('/profile', [ProfileController::class, 'index']);
    Route::post('/profile', [ProfileController::class, 'store']);
    Route::post('/profile/password-update', [ProfileController::class, 'passwordUpdate']);
    Route::post('/checkout', [CheckoutController::class, 'checkout']);
    Route::post('/checkout/{order}', [CheckoutController::class, 'checkoutOrder']);
    Route::get('/checkout/success', [CheckoutController::class, 'success']);
    Route::get('/checkout/failure', [CheckoutController::class, 'failure']);
    Route::get('/orders', [OrderController::class, 'index']);
    Route::get('/orders/{order}', [OrderController::class, 'view']);
});

Route::post('/webhook/stripe', [CheckoutController::class, 'webhook']);

require __DIR__ . '/auth.php';
