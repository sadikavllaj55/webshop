<?php

namespace App\Http\Controllers;

use App\Models\Address;
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
        $items = $this->getCartItems();
        $address = $this->storeAddress($request);
        $totalPrice = 0;

        foreach ($items as $item) {
            $price = $item['price'];
            $quantity = $item['quantity'];

            $totalPrice += $price * $quantity;
        }

        $order = Order::create([
            'reference_id' => Str::random(10),
            'address_id' => $address->id,
            'customer_email' => $request->email,
            'customer_phone' => $request->phone,
            'total_price' => $totalPrice,
            'status' => 'pending',
        ]);

        foreach ($items as $item) {
            $productId = $item['product_id'];
            $price = $item['price'];
            $quantity = $item['quantity'];
            $totalPrice = $price * $quantity;

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
    }

    public function getProducts($productIds)
    {
        return Product::whereIn('id', $productIds)->get();
    }

    public function storeAddress($request)
    {
       return  Address::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'address_line_1' => $request->address_line_1,
            'address_line_2' => $request->address_line_2,
            'city' => $request->city,
            'state' => $request->state,
            'country' => $request->country,
            'postal_code' => $request->zip_code,
        ]);
    }
}
