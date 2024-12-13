<?php

namespace App\Http\Controllers;
use App\Models\ProductManagement;


class AddToCartController
{
    public function index(){
        $products = ProductManagement::all();
        return view("addtocart.addtocart", compact("products"));
    }

    public function products(){
        $products = ProductManagement::all();
        return view("addtocart.products", compact("products"));
    }
}
