<?php


namespace App\Livewire;

use Livewire\Component;

class AddToCartComponent extends Component
{
    public $message = 'Nothing yet';

    protected $listeners = ['addToCart'];

    // Method to handle the add-to-cart action
    public function addToCart($productId)
    {
        // For testing, let's just update the message
        $this->message = "Product $productId added to cart!";
    }

    public function render()
    {
        return view('livewire.add-to-cart-component');
    }
}
