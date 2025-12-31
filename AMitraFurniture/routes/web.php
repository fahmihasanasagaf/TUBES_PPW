<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;

// ===============================
// HOME
// ===============================
Route::get('/', [HomeController::class, 'index'])->name('home');

// ===============================
// AUTH
// ===============================
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.store');
    Route::get('/register', [AuthController::class, 'registerForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.store');
});

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout')
    ->middleware('auth');

// ===============================
// PRODUCT
// ===============================
Route::get('/produk', [ProductController::class, 'index'])->name('products.index');
Route::get('/produk/{slug}', [ProductController::class, 'show'])->name('products.show');
Route::get('/kategori/{category}', [HomeController::class, 'category'])->name('category.show');
Route::get('/produk/{id}/detail', [ProductController::class, 'detail'])->name('products.detail');

// ===============================
// CART
// ===============================
Route::middleware('auth')->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
    Route::patch('/cart/{cart}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/{cart}', [CartController::class, 'remove'])->name('cart.remove');
    Route::delete('/cart/{cart}/destroy', [CartController::class, 'destroy'])->name('cart.destroy');
});

// ===============================
// AUTH USER AREA
// ===============================
Route::middleware('auth')->group(function () {

    // PROFILE
    Route::get('/profil', [ProfileController::class, 'show'])->name('profile.show');
    Route::patch('/profil', [ProfileController::class, 'update'])->name('profile.update');

    // CHECKOUT
    Route::get('/checkout', [OrderController::class, 'checkout'])->name('orders.checkout');
    Route::get('/checkout/{id}', [ProductController::class, 'checkout'])->name('checkout.direct');

    // ✅ PAYMENT (WAJIB ADA)
    Route::post('/checkout/{id}/pay', [OrderController::class, 'pay'])
        ->name('checkout.pay');

    // OPTIONAL (kalau pakai form checkout biasa)
    Route::post('/checkout', [OrderController::class, 'store'])->name('orders.store');

    // ORDER
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');

    // PAYMENT RESULT
    Route::get('/payment/page/{order}', [OrderController::class, 'paymentPage'])
        ->name('payment.page');

    Route::get('/payment/success/{order}', [OrderController::class, 'paymentSuccess'])
        ->name('payment.success');
});

// ===============================
// MIDTRANS CALLBACK (NO AUTH)
// ===============================
Route::post('/payment/callback', [OrderController::class, 'callback'])
    ->name('payment.callback');
