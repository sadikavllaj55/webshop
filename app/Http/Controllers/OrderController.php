<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ShoppingCart;
use Illuminate\Http\Request;
use App\Models\OrderItem;
use App\Models\Order;
use Illuminate\Support\Str;

class OrderController extends Controller
{

    public function index()
    {

        $items = $this->getCartItems();
        $totalPrice = 0;
        foreach ($items as $item) {
            $item->itemsprice = $item->price * $item->quantity;
            $totalPrice += $item->itemsprice;
        }

        return view('checkout.index', compact('items', 'totalPrice'));
    }

    public function getCartItems()
    {
        $cart = ShoppingCart::fromSession();
        return $cart->getItems();
    }

    public function store(Request $request)
    {
        $items = $request->input('items', []);
        $totalPrice = 0;

        foreach ($items as $item) {
            $price = $item['price'];
            $quantity = $item['quantity'];

            $totalPrice += $price * $quantity;
        }
        $order = Order::create([
            'reference_id' => Str::random(10),
            'total_price' => $totalPrice,
            'status_id' => 1,//pending
        ]);

        foreach ($items as $item) {
            $productId = $item['product_id'];
            $price = $item['price'];
            $quantity = $item['quantity'];
            $totalPrice = $price * $quantity;
            // You can dump or do something with $price here
            $productDetails = $this->getProducts([$productId]);
            $productName = $productDetails->pluck('name')->implode(', ');
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $productId,
                'product_name' => $productName,
                'price' => $price,
                'quantity' => $quantity,
                'total' => $totalPrice
            ]);

        }
        return redirect()->route('order.address', ['ref' => $order->reference_id]);
    }

    public function getProducts($productIds)
    {
        return Product::whereIn('id', $productIds)->get();
    }
}
