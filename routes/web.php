<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');

Route::prefix('products')->name('products.')->group(function (): void {
    Route::get('/', [ProductController::class, 'index'])->name('index');
    Route::get('/category/{category:slug}', [ProductController::class, 'category'])->name('category');
    Route::get('/{product:slug}', [ProductController::class, 'show'])->name('show');
});

Route::prefix('checkout')->name('checkout.')->group(function (): void {
    Route::get('/{product:slug}', [CheckoutController::class, 'show'])->name('show');
    Route::post('/{product:slug}', [CheckoutController::class, 'store'])->name('store');
    Route::get('/result/{order}', [CheckoutController::class, 'result'])->name('result');
});

Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{post:slug}', [BlogController::class, 'show'])->name('blog.show');

Route::get('/contact', ContactController::class)->name('contact');

Route::get('/cart', function () {
    return view('cart.index', [
        'cartProducts' => Product::query()->whereTrue('is_active')->with('category')->whereTrue('is_featured')->limit(3)->get(),
    ]);
})->name('cart.index');

Route::get('/page/{page:slug}', [PageController::class, 'show'])->name('page.show');
Route::get('/policies/{page:slug}', [PageController::class, 'show'])->name('page.policy');
