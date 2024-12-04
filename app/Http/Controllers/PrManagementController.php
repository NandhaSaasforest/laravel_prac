<?php

namespace App\Http\Controllers;

use App\Models\PrManagement;
use Illuminate\Http\Request;

class PrManagementController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = PrManagement::all();
        return view("products.index", compact("products"));
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

        PrManagement::create(request()->all());

        return redirect()->route('products.index')->with('success', 'Product has been created!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $product = PrManagement::findOrFail($id);
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        $product = PrManagement::findOrFail($id);
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

        $product = PrManagement::findOrFail($id);

        $product->update(request()->all());
        return redirect()->route('products.index')->with('success', 'Product has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = PrManagement::findOrFail($id);
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product has been deleted successfully!');
    }
}
