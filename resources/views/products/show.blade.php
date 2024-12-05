@extends('layout')

@section('content')
    <h1>Product Details</h1>
    <p>Name: {{ $product->name }}</p>
    <p>Price: ${{ $product->price }}</p>
    <p>Quantity: {{ $product->quantity }}</p>
    <a href="{{ route('products.index') }}">Back to List</a>
@endsection
