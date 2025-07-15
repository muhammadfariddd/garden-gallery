<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

// Home route
Route::get('/', function () {
    return view('home');
})->name('home');

// Clear flash message route
Route::post('/clear-flash-message', function () {
    session()->forget(['success', 'error', 'info', 'cart_action', 'cart_info']);
    return response()->json(['status' => 'success']);
});

// Product routes
Route::resource('products', ProductController::class);

// Category routes
Route::resource('categories', CategoryController::class);

// Order routes
Route::middleware(['auth'])->group(function () {
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');
    Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
    Route::patch('/orders/{order}/status', [OrderController::class, 'updateStatus'])->name('orders.update.status');
    Route::patch('/orders/{order}/payment', [OrderController::class, 'updatePaymentStatus'])->name('orders.update.payment');
});

// Review routes
Route::middleware(['auth'])->group(function () {
    Route::post('/products/{product}/reviews', [ReviewController::class, 'store'])->name('reviews.store');
    Route::patch('/reviews/{review}', [ReviewController::class, 'update'])->name('reviews.update');
    Route::delete('/reviews/{review}', [ReviewController::class, 'destroy'])->name('reviews.destroy');
});

// Cart routes
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
Route::patch('/cart/update/{product}', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/remove/{product}', [CartController::class, 'remove'])->name('cart.remove');
Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout')->middleware('auth');
Route::post('/checkout/process', [CartController::class, 'processCheckout'])->name('checkout.process')->middleware('auth');

// Static pages
Route::view('/about', 'about.index')->name('about');
Route::view('/care-guide', 'pages.care-guide')->name('care-guide');
Route::get('/shop', [ProductController::class, 'index'])->name('shop');

// User Management Routes
Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('users', UserController::class);
});

// Profile Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    Route::put('/profile', [UserController::class, 'updateProfile'])->name('profile.update');
});

// Authentication Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Product detail route
Route::get('/products/{slug}', [ProductController::class, 'show'])->name('products.show');
