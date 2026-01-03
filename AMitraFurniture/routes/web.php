<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\AdminDashboardController;

/*
|--------------------------------------------------------------------------
| HOME (USER)
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('home');

/*
|--------------------------------------------------------------------------
| AUTH USER
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.store');

    Route::get('/register', [AuthController::class, 'registerForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.store');

    // Google OAuth Routes
    Route::get('/auth/google', [AuthController::class, 'redirectToGoogle'])->name('auth.google');
    Route::get('/auth/google/callback', [AuthController::class, 'handleGoogleCallback'])->name('auth.google.callback');
});

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout')
    ->middleware('auth');

/*
|--------------------------------------------------------------------------
| PRODUCT (USER)
|--------------------------------------------------------------------------
*/
Route::get('/produk', [ProductController::class, 'index'])->name('products.index');
Route::get('/produk/{slug}', [ProductController::class, 'show'])->name('products.show');
Route::get('/kategori/{category}', [HomeController::class, 'category'])->name('category.show');
Route::get('/produk/{id}/detail', [ProductController::class, 'detail'])->name('products.detail');

// SEARCH WITH OPTIONAL PARAMETER
Route::get('/search/{keyword?}', [ProductController::class, 'search'])->name('search');

/*
|--------------------------------------------------------------------------
| CART
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
    Route::patch('/cart/{cart}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/{cart}', [CartController::class, 'remove'])->name('cart.remove');
    Route::delete('/cart/{cart}/destroy', [CartController::class, 'destroy'])->name('cart.destroy');
});

/*
|--------------------------------------------------------------------------
| USER AREA
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    Route::get('/profil', [ProfileController::class, 'show'])->name('profile.show');
    Route::patch('/profil', [ProfileController::class, 'update'])->name('profile.update');

    Route::get('/checkout', [OrderController::class, 'checkout'])->name('orders.checkout');
    Route::get('/checkout/{id}', [ProductController::class, 'checkout'])->name('checkout.direct');

    Route::post('/checkout/{id}/pay', [OrderController::class, 'pay'])
        ->name('checkout.pay');

    Route::post('/checkout', [OrderController::class, 'store'])->name('orders.store');
    Route::post('/checkout/direct', [OrderController::class, 'storeDirect'])->name('orders.storeDirect');

    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');
    Route::post('/orders/{order}/confirm-payment', [OrderController::class, 'confirmPayment'])->name('orders.confirmPayment');
    
    // FILTER ORDERS WITH OPTIONAL STATUS
    Route::get('/orders/filter/{status?}', [OrderController::class, 'filter'])->name('orders.filter');

    Route::get('/payment/page/{order}', [OrderController::class, 'paymentPage'])
        ->name('payment.page');

    Route::get('/payment/success/{order}', [OrderController::class, 'paymentSuccess'])
        ->name('payment.success');
});

/*
|--------------------------------------------------------------------------
| MIDTRANS CALLBACK
|--------------------------------------------------------------------------
*/
Route::post('/payment/callback', [OrderController::class, 'callback'])
    ->name('payment.callback');

/*
|--------------------------------------------------------------------------
| ================= ADMIN AREA =================
|--------------------------------------------------------------------------
| ADMIN TERPISAH & DIAMANKAN
|--------------------------------------------------------------------------
*/

// LOGIN ADMIN
Route::get('/admin/login', [AuthController::class, 'loginForm'])
    ->name('admin.login');

Route::post('/admin/login', [AuthController::class, 'login'])
    ->name('admin.login.store');

// REGISTER ADMIN
Route::get('/admin/register', [AuthController::class, 'registerForm'])
    ->name('admin.register');

Route::post('/admin/register', [AuthController::class, 'register'])
    ->name('admin.register.store');

// ADMIN AREA
Route::middleware(['auth', 'admin'])->group(function () {

    // DASHBOARD + GRAFIK
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])
        ->name('admin.dashboard');
    
    // LAPORAN WITH OPTIONAL MONTH
    Route::get('/admin/laporan/{bulan?}', [AdminDashboardController::class, 'report'])
        ->name('admin.laporan');

    // PESANAN (UBAH STATUS)
    Route::get('/admin/pesanan', [AdminOrderController::class, 'index'])
        ->name('admin.pesanan.index');

    Route::get('/admin/pesanan/{order}/edit', [AdminOrderController::class, 'edit'])
        ->name('admin.pesanan.edit');

    Route::put('/admin/pesanan/{order}', [AdminOrderController::class, 'update'])
        ->name('admin.pesanan.update');

    // PRODUK (CRUD + GAMBAR)
    Route::get('/admin/produk', [AdminProductController::class, 'index'])
        ->name('admin.produk.index');

    Route::get('/admin/produk/create', [AdminProductController::class, 'create'])
        ->name('admin.produk.create');

    Route::post('/admin/produk', [AdminProductController::class, 'store'])
        ->name('admin.produk.store');

    Route::get('/admin/produk/{product}/edit', [AdminProductController::class, 'edit'])
        ->name('admin.produk.edit');

    Route::put('/admin/produk/{product}', [AdminProductController::class, 'update'])
        ->name('admin.produk.update');

    Route::delete('/admin/produk/{product}', [AdminProductController::class, 'destroy'])
        ->name('admin.produk.destroy');

    // PENGIRIMAN & NOTIFIKASI (UI)
    Route::get('/admin/pengiriman', [AdminOrderController::class, 'shipping'])
        ->name('admin.pengiriman');

    Route::get('/admin/notifikasi', fn () => view('admin.notifikasi'))
        ->name('admin.notifikasi');
});
