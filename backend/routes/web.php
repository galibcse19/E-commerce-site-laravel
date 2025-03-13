<?php


use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
 

Route::get('/', function () {
    return redirect('/home'); // Redirect to home by default
});

Route::get('/addProduct', [ProductController::class, 'create'])->name('addProduct');
Route::post('/addProduct', [ProductController::class, 'store'])->name('product.store');

Route::get('/products', [ProductController::class, 'index'])->name('products.list');

Route::get('/{page}', function ($page) {
    if (view()->exists("pages.$page")) {
        return view('welcome', ['page' => $page]); // Load the correct view inside welcome.blade.php
    }
    abort(404); // Show 404 page if the view does not exist
});
 


