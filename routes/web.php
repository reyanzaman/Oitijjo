<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('homepage');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/products', function () {
    return view('products');
})->name('products');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/item', 'App\Http\Controllers\ItemController@getItemData')->name('item');

Route::get('/cart', function () {
    return view('cart');
})->name('cart');

Route::get('/checkout', function () {
    return view('checkout');
})->name('checkout');

Route::get('/tracking', function () {
    return view('tracking');
})->name('tracking');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::middleware(['web'])->group(function () {
    Route::post('/order', 'App\Http\Controllers\CheckoutController@orderCart')->name('order');
});

Route::get('/status', 'App\Http\Controllers\CheckoutController@orderStatus')->name('status');

Route::get('/delivery', function () {
    return view('panels/delivery');
})->name('delivery');

Route::get('/admin', function () {
    return view('panels/admin');
})->name('admin');

Route::post('/deliveryStatus', 'App\Http\Controllers\DeliveryController@updateStatus')->name('deliveryStatus');

require __DIR__.'/auth.php';