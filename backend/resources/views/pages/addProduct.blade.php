@extends('welcome')

@section('content')
<h1 class="text-3xl font-bold text-center mb-6">Add Product</h1>

@if(session('success'))
    <div class="bg-green-500 text-white text-center p-3 mb-4 rounded">
        {{ session('success') }}
    </div>
@endif

<form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data" class="max-w-lg mx-auto bg-white p-6 shadow-lg rounded-lg">
    @csrf
    <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2">Title:</label>
        <input type="text" name="title" class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400" required>
    </div>

    <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2">Image:</label>
        <input type="file" name="image" class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
    </div>

    <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2">Price:</label>
        <input type="number" step="0.01" name="price" class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400" required>
    </div>

    <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2">Category:</label>
        <input type="text" name="category" class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400" required>
    </div>

    <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded hover:bg-blue-600 transition duration-300">
        Submit
    </button>
</form>
@endsection
