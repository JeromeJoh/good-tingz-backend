<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::query()
            ->where('published', '=', 1)
            ->orderBy('updated_at', 'desc')
            ->paginate(5);
        return response()->json($products);
    }
    public function details()
    {
        $product = Product::query()
            ->where('published', '=', 1);
        return response()->json($product);
    }
}
