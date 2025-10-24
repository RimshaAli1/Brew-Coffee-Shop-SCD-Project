<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all(); // fetch all products from DB
        return view('products', compact('products')); // blade file: products.blade.php
    }
}
