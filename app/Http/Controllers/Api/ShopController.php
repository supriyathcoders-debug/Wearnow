<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Product;

class ShopController extends Controller
{
    public function shops()
    {
        $shops = Shop::all();
        return response()->json([
            'message' => 'Shops API',
            'shops' => $shops,
        ]);
    }
    public function products(Request $request, $id)
    {
        $shop = Shop::find($id);
        $products = $shop->products()->with(['user'])->get();
        return response()->json([
            'message' => 'Products API',
            'products' => $products,
        ]);
    }
}
