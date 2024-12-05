<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    public function find($id)
    {
        // Find the post by its ID
        $product = Product::findOrFail($id);

        // Return the view with the post data
        return response()->json($product, 200);
    }

    public function list()
    {
        $products = Product::all();
        // return view('product', ['products' => $products]);
        return response()->json($products, 200);
    }
}
