<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductReview;
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
        $page_size = $request->query('ps', 10);
        $order = $request->query('order', 'date');
        $min_rating = $request->query('min_rating');

        $category = $request->query('cat_id');
        $selected_category = null;

        if ($view === 'grid') {
            $product_list_classes = 'row g-4 row-cols-xl-4 row-cols-lg-3 row-cols-2 row-cols-md-2 mt-2';
        } elseif ($view === 'list') {
            $product_list_classes = 'row g-4 row-cols-1 mt-2';
        } else {
            abort(404);
        }

        $query = Product::shopItems();

        $price_limits = Product::query()->select(DB::raw('MIN(price) as min, MAX(price) as max'))->first();

        if ($category !== null) {
            $query = $query->where('products.category_id', '=', $category)
                ->orWhere('categories.parent_id', '=', $category);
            $selected_category = Category::query()->findOrFail($category);
        }

        if ($min_rating !== null) {
            $query = $query->having('rating', '>=', $min_rating);
        }

        $products = $query->groupBy('products.id');

        switch ($order) {
            case 'price':
                $products = $products->orderBy('products.price');
                break;
            case 'price_desc':
                $products = $products->orderBy('products.price', 'desc');
                break;
            case 'rating':
                $products = $products->orderBy('rating', 'desc');
                break;
            case 'date':
            default:
                $products = $products->latest('products.created_at');
        }

        $products = $products->paginate($page_size);

        return view(
            'products.index',
            compact(
                'view',
                'products',
                'product_list_classes',
                'price_limits',
                'category',
                'selected_category',
                'page_size',
                'order',
                'min_rating'
            )
        );
    }

    public function show($id): View
    {
        $product = Product::with(['images', 'category'])->findOrFail($id);
        $reviews = ProductReview::with('author')->where('product_id', $id)->paginate(20);

        $ratings_count = $product->reviews->countBy(function ($item) {
            return $item->rating;
        });
        return view('products.view', compact('product', 'ratings_count', 'reviews'));
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function updateCart(Request $request): JsonResponse
    {
        $cart = ShoppingCart::fromSession();

        $product_id = $request->input('product');
        $operation = $request->input('operation', 'add');
        $quantity = $request->input('quantity', '0');

        $product = Product::with('image')->findOrFail($product_id);

        if ($operation === 'add') {
            $cart->add($product, intval($quantity));
        }

        if ($operation === 'sub') {
            $cart->sub($product, intval($quantity));
        }

        if ($operation === 'clear') {
            $cart->remove($product);
        }

        $cart->save();

        return new JsonResponse($cart);
    }

    public function getCartItems()
    {
        $cart = ShoppingCart::fromSession();
        $items = $cart->getItems();

        return response()->json([
            'items' => $items,
        ]);
    }
}
