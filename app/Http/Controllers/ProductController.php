<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index(Request $request): View
    {
        $view = $request->query('view', 'grid');
        $page_size = $request->query('ps', 20);
        $category = $request->query('cat_id');

        if ($view === 'grid') {
            $product_list_classes = 'row g-4 row-cols-xl-4 row-cols-lg-3 row-cols-2 row-cols-md-2 mt-2';
        } elseif ($view === 'list') {
            $product_list_classes = 'row g-4 row-cols-1 mt-2';
        } else {
            abort(404);
        }

        $categories = Category::with('children')->whereNull('parent_id')->get();

        $query = Product::shopItems();

        $price_limits = Product::query()->select(DB::raw('MIN(price) as min, MAX(price) as max'))->first();

        if ($category !== null) {
            $query = $query->where('products.category_id', '=', $category)
                ->orWhere('categories.parent_id', '=', $category);
        }

        $products = $query->groupBy('products.id')->latest()->paginate($page_size);

        return view(
            'products.index',
            compact('view', 'products', 'categories', 'product_list_classes', 'price_limits')
        );
    }

    public function category(string $name): View
    {
        $categories = Category::query()->where('slug', '=', $name)->get();

        return view('products.index', compact('categories'));
    }

    public function show($id): View
    {
        $product = Product::with('images', 'category')->findOrFail($id);
        return view('products.show', compact('product'));
    }
}
