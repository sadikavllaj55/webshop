<?php
/**
 * @var \App\Models\ShoppingCart $cart
 */
?>
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header border-bottom">
        <div class="text-start">
            <h5 id="offcanvasRightLabel" class="mb-0 fs-4">Shopping Cart</h5>
            <small>Location</small>
        </div>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div>
            <div class="py-3">
                <ul class="list-group list-group-flush" id="cart-items-container">
                    @foreach($cart->getItems() as $item)
                        <li class="list-group-item py-3 px-0">
                            <div class="row row align-items-center">
                                <div class="col-2">
                                    <img src="{{ asset($item->product->image->path) }}" alt="{{ $item->product->name }}"
                                         class="img-fluid">
                                </div>
                                <div class="col-5">
                                    <h6 class="mb-0">{{ $item->product->name }}</h6>
                                    <span><small class="text-muted">250g</small></span>
                                    <div class="mt-2 small">
                                        <a href="#"
                                           class="cart-remove-item text-decoration-none"
                                           data-product="{{ $item->product_id }}"
                                           data-operation="remove">
                                            <i class="bi bi-trash"></i> Remove
                                        </a>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="input-group  flex-nowrap justify-content-center">
                                        <input type="button" value="-"
                                               class="sub-cart button-minus form-control text-center flex-xl-none w-xl-30 w-xxl-10 px-0"
                                               data-operation="sub"
                                               data-product="{{ $item->product_id }}"
                                               data-field="quantity">
                                        <input type="number" step="1" min="1" value="{{ $item->quantity }}"
                                               name="quantity"
                                               class="quantity-field form-control text-center flex-xl-none w-xl-30 w-xxl-10 px-0">
                                        <input type="button" value="+"
                                               class="add-cart button-plus form-control  text-center flex-xl-none w-xl-30  w-xxl-10 px-0"
                                               data-operation="add"
                                               data-product="{{ $item->product_id }}"
                                               data-field="quantity">
                                    </div>
                                </div>
                                <div class="col-2 text-end">
                                    <span class="fw-bold product-price">{{ $item->price }}</span>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="d-grid cart-checkout-btn-container">
                @if(!empty($cart->getItems()))
                    <a href="{{ route('checkout.index') }}" class="btn btn-primary btn-lg d-flex justify-content-between align-items-center"
                            type="submit" id="cart-submit-btn">
                        Go to Checkout <span class="fw-bold" id="cart-total">${{ $cart->getTotal() }}</span>
                    </a>
                @else
                    <div class="alert alert-warning">
                        No items in the shopping cart
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
