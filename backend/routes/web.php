<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

// Redirect root to home
Route::get('/home', function () {
    return view('pages.home'); 
})->name('home');

// Show Add Product Form
Route::get('/addProduct', [ProductController::class, 'create'])->name('addProduct');

// Store Product Data
Route::post('/addProduct', [ProductController::class, 'store'])->name('product.store');

// Show Products (Blade)
Route::get('/products', [ProductController::class, 'showProducts'])->name('products.list');

// Fetch Products as JSON (for React)
Route::get('/api/products', [ProductController::class, 'getProducts']); 

// Dynamic Page Handling
Route::get('/{page}', function ($page) {
    if (view()->exists("pages.$page")) {
        return view('welcome', ['page' => $page]);
    }
    abort(404);
});
