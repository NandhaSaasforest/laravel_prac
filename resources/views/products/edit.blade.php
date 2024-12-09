@extends('layout')

@section('content')
    <h1>Edit Product</h1>
    <form action="{{ route('products.update', ['product' => $product->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <label>Name: <input type="text" name="name" value="{{ $product->name }}" required></label><br>
        <label>Price: <input type="number" name="price" value="{{ $product->price }}" step="0.01" required></label><br>
        <label>Size: <input type="text" name="size" value="{{ $product->size }}" step="0.01" required></label><br>
        <label>Quantity: <input type="number" name="quantity" value="{{ $product->quantity }}" required></label><br>
        <button type="submit">Update</button>
    </form>
@endsection
