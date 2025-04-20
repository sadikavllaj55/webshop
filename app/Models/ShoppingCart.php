<?php

namespace App\Models;

use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class ShoppingCart implements \JsonSerializable
{
    private array $items = [];

    public function add(Product $product, int $quantity = 1): void
    {
        $item = new OrderItem();

        $item->product_id = $product->id;
        $item->quantity = $quantity;
        $item->price = $product->price;
        $item->product = $product;

        if (array_key_exists($product->id, $this->items)) {
            $this->items[$product->id]->quantity += $quantity;
        } else {
            $this->items[$product->id] = $item;
        }
    }

    public function getTotal(): float
    {
        $total = 0.0;

        foreach ($this->items as $item) {
            $total += $item->price * $item->quantity;
        }

        return $total;
    }

    public function remove(Product $product, int $quantity = 1): void
    {
        if (($this->items[$product->id]?->quantity ?? 0) <= 1) {
            unset($this->items[$product->id]);
        } else {
            $this->items[$product->id]->quantity -= $quantity;
        }
    }

    public function save(): void
    {
        session()->put('cart', $this);
    }

    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public static function fromSession(): ShoppingCart
    {
        $cart = session()->get('cart');

        if (!($cart instanceof ShoppingCart)) {
            $cart = new ShoppingCart();
            $cart->save();
        }

        return $cart;
    }

    public function jsonSerialize(): mixed
    {
        return [
            'items' => $this->items,
            'total' => $this->getTotal(),
        ];
    }
}
