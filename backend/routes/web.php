<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

// Redirect root to home
Route::get('/', function () {
    return view('pages.home'); 
})->name('home');
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


//add product all 
Route::get('/addProductAll', [ProductController::class, 'createAll'])->name('addProductAll');
Route::post('/addProductAll', [ProductController::class, 'storeAll'])->name('allproduct.store');
Route::get('/productsAll', [ProductController::class, 'showProductsAll'])->name('productsAll.list');
Route::get('/api/productsAll', [ProductController::class, 'getProductsAll']);

//add slider image(offer)
Route::get('/addOfferImage', [ProductController::class, 'createOffer'])->name('addOfferImage');
Route::post('/addOfferImage', [ProductController::class, 'storeOffer'])->name('offerImage.store');
Route::get('/api/offerImage', [ProductController::class, 'getOfferImage']);

// Dynamic Page Handling
Route::get('/{page}', function ($page) {
    if (view()->exists("pages.$page")) {
        return view('welcome', ['page' => $page]);
    }
    abort(404);
});
