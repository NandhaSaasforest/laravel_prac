<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function find($id)
    {
        // Find the post by its ID
        $product = Product::find($id);

        // If the post doesn't exist, return a 404 error page
        if (!$product) {
            abort(404, 'Product not found');
        }

        // Return the view with the post data
        return view('product', ['product' => $product]);
    }

    public function list(Request $request){
        $products = Product::all();
        return view('product', ['products'=> $products]);
    }
}
