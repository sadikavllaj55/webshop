<!-- resources/views/livewire/add-to-cart-component.blade.php -->

<div>
    <h1>{{ $message }}</h1>

    <!-- Test Add to Cart Button -->
    <a href="#"
       class="btn btn-primary btn-sm"
       wire:click.prevent="addToCart(1)">
        Add to Cart
    </a>
</div>
