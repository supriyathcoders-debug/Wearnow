<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function products()
    {
        $products = Product::all();
        return response()->json([
            'message' => 'Products API',
            'products' => $products,
        ]);
    }
    public function productsDetails($id)
    {
        $products = Product::find($id)->with(['user'])->get();
        return response()->json([
            'message' => 'Products API',
            'products' => $products,
        ]);
    }
}
