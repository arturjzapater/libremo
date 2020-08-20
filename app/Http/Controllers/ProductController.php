<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function readAll()
    {
        $products = Product::orderBy('title', 'asc')
            ->get();

        return response()->json($products);
    }

    public function readOne($id)
    {
        $product = Product::find($id);
        return $product
            ? response()->json(Product::find($id))
            : response()->json([ 'message' => 'Not Found' ], 404);
    }
}
