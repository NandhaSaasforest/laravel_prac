@extends('layout')

@section('content')
    <h1>Login</h1>
    <form action="/prlogin" method="POST">
        @csrf
        <label>Username: <input type="text" name="name" required></label>
        <label>Password <input type="number" name="pass" required></label>
        <button type="submit">Login</button>
    </form>

    @if (session('failed'))
        <p>{{ session('failed') }}</p>
    @endif

    <h1>Product List</h1>
    <a href="{{ route('products.create') }}">Create New Product</a>

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @isset($products)
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>${{ $product->price }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>
                            <a href="{{ route('products.show', $product->id) }}">View</a>
                            <a href="{{ route('products.edit', $product->id) }}">Edit</a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endisset

        </tbody>
    </table>
@endsection
