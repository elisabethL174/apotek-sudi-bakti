<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class MarketplaceController extends Controller
{
    public function index()
    {
        // Fetch products from your database or source
        $products = Product::all(); // Replace this with your actual logic to fetch products

        // Return the view with the products variable
        return view('marketplace.marketplace')->with('products', $products);
    }
}