@php use App\Models\ShoppingCart; @endphp
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
                                    <img src="{{ asset($item->product->image->path) }}" alt="{{ $item->product->name }}" class="img-fluid">
                                </div>
                                <div class="col-5">
                                    <h6 class="mb-0">{{ $item->product->name }}</h6>
                                    <span><small class="text-muted">250g</small></span>
                                    <div class="mt-2 small">
                                        <a href="#" class="cart-remove-item text-decoration-none">
                                            <span class="me-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                                                   stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                   class="feather feather-trash-2">
                                                <polyline points="3 6 5 6 21 6"></polyline>
                                                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                <line x1="10" y1="11" x2="10" y2="17"></line>
                                                <line x1="14" y1="11" x2="14" y2="17"></line>
                                                </svg>
                                            </span>Remove
                                        </a>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="input-group  flex-nowrap justify-content-center">
                                        <input type="button" value="-"
                                               class="button-minus form-control  text-center flex-xl-none w-xl-30 w-xxl-10 px-0  "
                                               data-field="quantity">
                                        <input type="number" step="1" min="1" value="{{ $item->quantity }}"
                                               name="quantity"
                                               class="quantity-field form-control text-center flex-xl-none w-xl-30 w-xxl-10 px-0 ">
                                        <input type="button" value="+"
                                               class="button-plus form-control  text-center flex-xl-none w-xl-30  w-xxl-10 px-0  "
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
            <div class="d-grid">
                <button class="btn btn-primary btn-lg d-flex justify-content-between align-items-center"
                        type="submit" id="cart-submit-btn">
                    Go to Checkout <span class="fw-bold" id="cart-total">${{ $cart->getTotal() }}</span></button>
            </div>
        </div>
    </div>
</div>
