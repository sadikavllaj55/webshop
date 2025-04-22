<?php

namespace App\Models;

use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class ShoppingCart implements \JsonSerializable
{
    private array $items = [];

    public function add(Product $product, int $quantity = 1): void
    {
        if (array_key_exists($product->id, $this->items)) {
            $this->items[$product->id]->quantity += $quantity;
        } else {
            $item = new OrderItem();

            $item->product_id = $product->id;
            $item->quantity = $quantity;
            $item->price = $product->price;
            $item->product = $product;

            $this->items[$product->id] = $item;
        }
    }

    public function sub(Product $product, int $quantity = 1): void
    {
        if (($this->items[$product->id]?->quantity ?? 0) <= 1) {
            unset($this->items[$product->id]);
        } else {
            $this->items[$product->id]->quantity -= $quantity;
        }
    }

    public function remove(Product $product): void
    {
        unset($this->items[$product->id]);
    }

    public function getTotal(): float|string
    {
        $total = 0.0;

        foreach ($this->items as $item) {
            $total += $item->price * $item->quantity;
        }

        return $total;
    }

    public function empty(): bool
    {
        return empty($this->items);
    }

    public function save(): void
    {
        session()->put('cart', $this);
    }

    /**
     * @return OrderItem[]
     */
    public function getItems(): array
    {
        return $this->items;
    }

    public function getItemsForInsert(): array
    {
        return array_map(function ($item) {
            unset($item->product);
            return $item;
        }, $this->getItems());
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

    public function clear(): void
    {
        $this->items = [];
    }

    public function jsonSerialize(): array
    {
        return [
            'items' => $this->items,
            'total' => number_format($this->getTotal(), 2),
        ];
    }
}
