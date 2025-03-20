<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Models\Product;
use App\Models\AllProduct;
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

    public function createAll() {
        return view('pages.addProductAll');
    }
    
    public function storeAll(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required|numeric',
            'discount_price' => 'nullable|numeric',
            'stock' => 'required|integer',
            'category' => 'required|string',
            'brand' => 'nullable|string',
            'color' => 'nullable|string',
            'availability' => 'required',
            'description' => 'nullable|string',
            'images1' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:2048',
            'images2' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:2048',
            'images3' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:2048',
        ]);

        // Handling Image Uploads
        $image1 = $request->file('images1') ? $request->file('images1')->store('products', 'public') : null;
        $image2 = $request->file('images2') ? $request->file('images2')->store('products', 'public') : null;
        $image3 = $request->file('images3') ? $request->file('images3')->store('products', 'public') : null;

        // Create Product
        AllProduct::create([
            'title' => $request->title,
            'price' => $request->price,
            'discount_price' => $request->discount_price,
            'stock' => $request->stock,
            'category' => $request->category,
            'brand' => $request->brand,
            'color' => $request->color,
            'availability' => $request->availability,
            'description' => $request->description,
            'image1' => $image1,
            'image2' => $image2,
            'image3' => $image3,
        ]);

        return redirect()->route('addProductAll')->with('success', 'Product added successfully!');
    }
    public function showProductsAll()
    {
        $products = AllProduct::all(); // Fetch all records from 'allproducts' table
        return view('pages.productsAll', compact('products')); // Pass data to the view
    }
    public function getProductsAll()
    {
        return response()->json(AllProduct::all());
    }

    public function createOffer(){
        return view('pages.Offer');
    }

    public function storeOffer(Request $request) {
        $request->validate([
            'category' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Store the image
        $imagePath = $request->file('image')->store('offers', 'public');

        // Save to database
        Offer::create([
            'category' => $request->category,
            'image' => $imagePath,
        ]);

        return back()->with('success', 'Offer added successfully!');
    }
    public function getOfferImage()
    {
        return response()->json(Offer::all());
    }
}
