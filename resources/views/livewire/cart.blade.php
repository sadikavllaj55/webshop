<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header border-bottom">
        <h5 id="offcanvasRightLabel" class="mb-0 fs-4">Shop Cart</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        @if (count($cartItems) > 0)
            <ul class="list-group list-group-flush">
                @foreach ($cartItems as $item)
                    <li class="list-group-item py-3 px-0">
                        <div class="row align-items-center">
                            <div class="col-2">
                                <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}" class="img-fluid">
                            </div>
                            <div class="col-5">
                                <h6 class="mb-0">{{ $item['name'] }}</h6>
                                <small class="text-muted">${{ $item['price'] }}</small>
                                <div class="mt-2 small">
                                    <a href="#" wire:click.prevent="removeItem({{ $item['id'] }})" class="text-danger">Remove</a>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="input-group">
                                    <button wire:click="decreaseQuantity({{ $item['id'] }})" class="btn btn-outline-secondary btn-sm">-</button>
                                    <input type="text" value="{{ $item['quantity'] }}" class="form-control form-control-sm text-center" readonly>
                                    <button wire:click="increaseQuantity({{ $item['id'] }})" class="btn btn-outline-secondary btn-sm">+</button>
                                </div>
                            </div>
                            <div class="col-2 text-end">
                                <span class="fw-bold">${{ $item['price'] * $item['quantity'] }}</span>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>

            <div class="mt-4 d-grid">
                <button class="btn btn-primary d-flex justify-content-between align-items-center">
                    Go to Checkout
                    <span class="fw-bold">${{ $total }}</span>
                </button>
            </div>
        @else
            <p class="text-center">Your cart is empty.</p>
        @endif
    </div>
</div>

