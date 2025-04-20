<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ShoppingCart;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class ProductController extends Controller
{
    public function index(Request $request): View
    {
        $view = $request->query('view', 'grid');
        $page_size = $request->query('ps', 20);

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

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $products = $query->latest()->paginate($page_size);

        return view(
            'products.index',
            compact('view', 'products', 'categories', 'product_list_classes', 'price_limits')
        );
    }

    public function show($id): View
    {
        $product = Product::with('images')->findOrFail($id);
        return view('products.show', compact('product'));
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function addToCart(Request $request)
    {
        $cart = ShoppingCart::fromSession();

        $product_id = $request->input('product');

        $product = Product::findOrFail($product_id);

        $cart->add($product);
        $cart->save();

        return new JsonResponse($cart);
    }
}
