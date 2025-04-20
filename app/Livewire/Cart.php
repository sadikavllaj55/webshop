<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;

class Cart extends Component
{
    public $cartItems = [];

    public function mount()
    {
        // Load cart items from session
        $this->cartItems = session()->get('cart', []);
    }

    public function removeItem($productId)
    {
        $cart = session()->get('cart', []);
        unset($cart[$productId]);
        session()->put('cart', $cart);
        $this->cartItems = $cart;
    }

    public function render()
    {
        return view('products.product-single-grid', [
            'cartItems' => $this->cartItems
        ]);
    }
    public function addToCart($productId)
    {
//        dd("Add to Cart function is being called!"); // Debugging
        $product = Product::findOrFail($productId);

        // Your cart logic here...
    }
//    public function addToCart($productId)
//    {
//        $product = Product::findOrFail($productId);
//
//        $cart = session()->get('cart', []);
//
//        if (isset($cart[$productId])) {
//            $cart[$productId]['quantity'] += 1;
//        } else {
//            $cart[$productId] = [
//                'name' => $product->name,
//                'price' => $product->price,
//                'quantity' => 1,
//                'image' => $product->image, // make sure product has this attribute
//                'weight' => $product->weight ?? '',
//            ];
//        }
//
//        session()->put('cart', $cart);
//        $this->cartItems = $cart;
//    }

}
