<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Show the Add Product Form
    public function create() {
        return view('pages.addProduct');
    }

    // Handle Product Submission
    public function store(Request $request) {
        // Validate the form data
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image
            'price' => 'required|numeric',
            'category' => 'required|string|max:255',
        ]);

        // Handle Image Upload
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        // Save Product to Database
        Product::create([
            'title' => $request->title,
            'image' => $imagePath,
            'price' => $request->price,
            'category' => $request->category,
        ]);

        return redirect()->route('addProduct')->with('success', 'Product added successfully!');
    }

    // Show Products in Laravel Blade (for /products)
    public function showProducts()
    {
        $products = Product::all();
        return view('pages.products', compact('products'));
    }

    // Fetch Products as JSON for React (for /api/products)
    public function getProducts()
    {
        return response()->json(Product::all());
    }
}
