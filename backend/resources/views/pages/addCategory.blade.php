@extends('welcome')

@section('content')
<h1 class="text-3xl font-bold text-center mb-6">Add Category</h1>

@if(session('success'))
    <div class="bg-green-500 text-white text-center p-3 mb-4 rounded">
        {{ session('success') }}
    </div>
@endif

<div class="max-w-lg mx-auto bg-white p-6 rounded shadow">
    <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-4">
            <label for="title" class="block text-gray-700 font-bold mb-2">Title:</label>
            <input type="text" id="title" name="title" class="w-full p-2 border rounded" required>
            @error('title')
                <p class="text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <!-- <div class="mb-4">
            <label for="category" class="block text-gray-700 font-bold mb-2">Category:</label>
            <input type="text" id="category" name="category" class="w-full p-2 border rounded" required>
            @error('category')
                <p class="text-red-500">{{ $message }}</p>
            @enderror
        </div> -->
        <div class="mb-4">
            <label for="category" class="block text-gray-700 font-bold mb-2">Category:</label>
            
            <select id="category" name="category" class="w-full p-2 border rounded">
                <option value="" disabled selected>Select a category</option>
                <option value="Electronics">Electronics</option>
                <option value="Clothing & Fashion">Clothing and Fashion</option>
                <option value="Accessories">Accessories</option>
                <option value="Home & Kitchen">Home and Kitchen</option>
                <option value="Beauty & Personal Care">Beauty and Personal Care</option>
                <option value="Sports & Fitness">Sports and Fitness</option>
                <option value="Toys & Games">Toys and Games</option>
                <option value="Books & Stationery">Books and Stationery</option>
                <option value="Jewelry & Watches">Jewelry and Watches</option>
                <option value="Baby Products">Baby Products</option>
                <option value="Mobile & Gadgets">Mobile and Gadgets</option>
                <option value="Music & Instruments">Music and Instruments</option>
            </select>

            @error('category')
                <p class="text-red-500">{{ $message }}</p>
            @enderror
        </div>


        <div class="mb-4">
            <label for="image" class="block text-gray-700 font-bold mb-2">Image:</label>
            <input type="file" id="image" name="image" class="w-full p-2 border rounded" required>
            @error('image')
                <p class="text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded hover:bg-blue-600">Add Post</button>
    </form>
</div>
@endsection
