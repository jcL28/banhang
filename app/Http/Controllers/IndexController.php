<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class IndexController extends Controller
{
    public function index()
    {
        $products = Product::limit(12)->get();
        return view('user.home', compact('products'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $products = Product::where('product_name', 'LIKE', "%{$query}%")
            ->orWhere('product_description', 'LIKE', "%{$query}%")
            ->get();

        return view('user.search_results', compact('products'));
    }
}
