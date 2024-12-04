@extends('layout')

@section('content')
    <h1>Create Product</h1>
    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <label>Name: <input type="text" name="name" required></label><br>
        <label>Price: <input type="number" name="price" step="0.01" required></label><br>
        <label>Quantity: <input type="number" name="quantity" required></label><br>
        <button type="submit">Create</button>
    </form>
@endsection
