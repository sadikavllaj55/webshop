<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $products = $query->latest()->paginate(12);

        return view('products.index', compact('products'));
    }

    public function show($id)
    {
        $product = Product::with('images')->findOrFail($id);
        return view('products.show', compact('product'));
    }
}
