<?php
/**
 * @var \App\Models\ShoppingCart $cart
 */

?>
@extends('layouts.front')

@section('title')
    Shop
@endsection

@section('content')
    <main>
        <!-- Breadcrumb -->
        <div class="py-2 shadow-sm position-relative">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Shop</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Shop Checkout</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <section class="pb-lg-14 pb-8 pt-8 bg-light">
            <div class="container">
                <div class="row">
                    <!-- Title -->
                    <div class="col-12">
                        <div>
                            <div class="mb-8">
                                <h1 class="fw-bold mb-0">Checkout</h1>
                                @guest
                                    <p class="mb-0">
                                        Already have an account? Click here to <a href="#" data-bs-toggle="modal"
                                                                                  data-bs-target="#userModal">Sign
                                            in</a>.
                                    </p>
                                @endguest
                            </div>
                        </div>
                    </div>
                    <!-- Order form -->
                    <div class="col-xl-7 col-lg-6 col-md-12">
                        <div class="card shadow-sm p-4">
                            <form method="post" class="needs-validation" action="{{ route('orders.create') }}" novalidate>
                                @csrf
                                <h4 class="fs-5 text-inherit h4 collapsed">
                                    <i class="feather-icon icon-map-pin me-2 text-muted"></i>
                                    Delivery address
                                </h4>
                                <div class="my-5">@include('orders.address-form')</div>
                                <h4 class="fs-5 text-inherit h4 collapsed">
                                    <i class="feather-icon icon-credit-card me-2 text-muted"></i>
                                    Payment Method
                                </h4>
                                <div class="mt-5">@include('orders.payment-form')</div>
                                <!-- Button -->
                                <div class="mt-5 d-flex justify-content-end">
                                    <a href="#" class="btn btn-outline-gray-400 text-muted">
                                        Go back
                                    </a>
                                    <button type="submit" class="btn btn-primary ms-2">Place Order</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Shopping cart -->
                    <div class="col-xl-5 col-lg-6 col-md-12">
                        <div class="mt-4 mt-lg-0">
                            <div class="card shadow-sm">
                                <h5 class="px-6 py-4 bg-transparent mb-0">Order Details</h5>
                                <ul class="list-group list-group-flush">
                                    @forelse($cart->getItems() as $item)
                                        <li class="list-group-item px-4 py-3">
                                            <div class="row align-items-center">
                                                <div class="col-2 col-md-2">
                                                    <img src="{{ asset($item->product->image->path) }}"
                                                         alt="{{ $item->product->name }}" class="img-fluid">
                                                </div>
                                                <div class="col-5 col-md-5">
                                                    <h6 class="mb-0">{{ $item->product->name }}</h6>
                                                    <span>
                                                        <small class="text-muted font-monospace">
                                                            $ {{ $item->getPrice() }}
                                                        </small>
                                                    </span>
                                                </div>
                                                <div class="col-2 col-md-2 text-center text-muted">
                                                    <span>{{ $item->quantity }}</span>
                                                </div>
                                                <div class="col-3 text-lg-end text-start text-md-end col-md-3">
                                                    <span
                                                        class="fw-bold font-monospace">${{ $item->getTotalPrice() }}</span>
                                                </div>
                                            </div>
                                        </li>
                                    @empty
                                        <em class="text-center text-danger p-4">No items in cart.</em>
                                    @endforelse
                                    <li class="list-group-item px-4 py-3">
                                        <div class="d-flex align-items-center justify-content-between mb-2">
                                            <div>Item Subtotal</div>
                                            <div class="fw-bold font-monospace">
                                                ${{ number_format($cart->getTotal(), 2) }}</div>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div>Shipping fee</div>
                                            <div class="fw-bold font-monospace">$0.00</div>
                                        </div>
                                    </li>
                                    <li class="list-group-item px-4 py-3">
                                        <div class="d-flex align-items-center justify-content-between fw-bold">
                                            <div>Subtotal</div>
                                            <div class="font-monospace">
                                                ${{ number_format($cart->getTotal(), 2) }}</div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/page/app.js') }}"></script>
    <script src="https://unpkg.com/imask"></script>
    <script>
        function setUpPaymentInputs() {
            const card_number_input = document.getElementById('card_nr');
            const expiry_date_input = document.getElementById('card_expiry');
            const cvc_input = document.getElementById('card_cvc');

            const card_mask = new IMask(card_number_input, {
                mask: '0000 0000 0000 0000'
            });
            const expiry_mask = new IMask(expiry_date_input, {
                mask: 'MM / YY',
                blocks: {
                    MM: {
                        mask: IMask.MaskedRange,
                        from: 1,
                        to: 12,
                        autofix: 'pad'
                    },
                    YY: {
                        mask: '00'
                    }
                }
            });
            const cvc_mask = new IMask(cvc_input, {
                mask: '000'
            });

            $('input[name="payment_type"]').on('change', function (ev) {
                const type = this.value;

                const $input_containers = $('[data-payment-inputs]');

                $input_containers.each(function () {
                    if(this.dataset.paymentInputs == type) {
                        $(this).find('input,select,textarea').prop('disabled', false);
                    } else {
                        $(this).find('input, select, textarea').prop('disabled', true);
                    }
                });
            });
        }

        window.addEventListener('load', () => {
            setUpPaymentInputs();
        })
    </script>
@endsection
