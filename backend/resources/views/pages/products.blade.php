@extends('welcome')

@section('content')
<h1 class="text-3xl font-bold text-center">Product List</h1>

<!-- Success Message -->
@if(session('success'))
    <div class="p-3 bg-green-500 text-white text-center my-3 rounded">
        {{ session('success') }}
    </div>
@endif

<table class="w-full mt-5 bg-white shadow-md rounded-lg">
    <thead>
        <tr class="bg-gray-200">
            <th class="py-2 px-4">ID</th>
            <th class="py-2 px-4">Title</th>
            <th class="py-2 px-4">Image</th>
            <th class="py-2 px-4">Price</th>
            <th class="py-2 px-4">Category</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
        <tr class="border-b text-center">
            <td class="py-2 px-4">{{ $product->id }}</td>
            <td class="py-2 px-4">{{ $product->title }}</td>
            <td class="py-2 px-4">
                @if($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" class="h-16 mx-auto">
                @else
                    No Image
                @endif
            </td>
            <td class="py-2 px-4">${{ $product->price }}</td>
            <td class="py-2 px-4">{{ $product->category }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
