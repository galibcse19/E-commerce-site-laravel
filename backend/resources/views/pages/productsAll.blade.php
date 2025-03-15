@extends('welcome')

@section('content')
    <h1>All Products</h1>

    @if($products->isEmpty())
        <p>No products found.</p>
    @else
        <table class="w-full">
            <tr>
                <th>Title</th>
                <th>Price</th>
                <th>Discount Price</th>
                <th>Stock</th>
                <th>Category</th>
                <th>Brand</th>
                <th>Color</th>
                <th>Availability</th>
                <th>Description</th>
                <th>Images</th>
            </tr>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->title }}</td>
                    <td>${{ $product->price }}</td>
                    <td>${{ $product->discount_price }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>{{ $product->category }}</td>
                    <td>{{ $product->brand }}</td>
                    <td>{{ $product->color }}</td>
                    <td>{{ $product->availability }}</td>
                    <td>{{ $product->description }}</td>
                    <td>
                        @if($product->image1)
                            <img src="{{ asset('storage/' . $product->image1) }}" width="50">
                        @endif
                        @if($product->image2)
                            <img src="{{ asset('storage/' . $product->image2) }}" width="50">
                        @endif
                        @if($product->image3)
                            <img src="{{ asset('storage/' . $product->image3) }}" width="50">
                        @endif
                    </td>
                </tr>
            @endforeach
        </table>
    @endif
@endsection