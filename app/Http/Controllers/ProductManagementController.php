<?php

namespace App\Http\Controllers;

use App\Models\ProductManagement;
use Illuminate\Http\Request;

class ProductManagementController
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        return view("products.index");
    }

    public function login(Request $request)
    {
        $validUsername = "admin";
        $validPassword = "12345";

        $username = $request->input("name");
        $password = $request->input('pass');

        if ($username == $validUsername && $password == $validPassword) {
            $products = ProductManagement::all();
            return view("products.index", compact("products"));
        } else {
            return redirect()->route('products.index')->with('failed', 'Username or Password is wrong!');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("products.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        request()->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
        ]);

        ProductManagement::create(request()->all());

        return redirect()->route('products.index')->with('success', 'Product has been created!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $product = ProductManagement::findOrFail($id);
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        $product = ProductManagement::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id)
    {
        request()->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
        ]);

        $product = ProductManagement::findOrFail($id);

        $product->update(request()->all());
        return redirect()->route('products.index')->with('success', 'Product has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = ProductManagement::findOrFail($id);
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product has been deleted successfully!');
    }
}