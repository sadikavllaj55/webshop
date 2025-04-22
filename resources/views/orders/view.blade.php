<?php
/**
 * @var \App\Models\Order $order
 */

?>
@extends('layouts.front')

@section('title')
    Order #{{ $order->reference_id }}
@endsection

@section('content')
    <section class="pb-lg-14 pb-8 pt-8 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-12 mb-5">
                    <!-- card -->
                    <div class="card h-100 card-lg">
                        <div class="card-body p-6">
                            <div class="d-md-flex justify-content-between">
                                <div class="d-flex align-items-center mb-2 mb-md-0">
                                    <h2 class="mb-0">Order ID: #{{ $order->reference_id }}</h2>
                                    {!! $order->getStatusHtml() !!}
                                </div>
                                <div class="d-md-flex">
                                    <!-- button -->
                                    <div class="ms-md-3">
                                        <a href="#" class="btn btn-primary">Download Invoice</a>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-8">
                                <div class="row">
                                    <!-- address -->
                                    <div class="col-lg-4 col-md-4 col-12">
                                        <div class="mb-6">
                                            <h6>Customer Details</h6>
                                            <p class="mb-1 lh-lg">
                                                {{ $order->address->fullName() }}
                                                <br>
                                                {{ $order->customer_email }}
                                                <br>
                                                {{ $order->customer_phone }}
                                            </p>
                                        </div>
                                    </div>
                                    <!-- address -->
                                    <div class="col-lg-4 col-md-4 col-12">
                                        <div class="mb-6">
                                            <h6>Shipping Address</h6>
                                            <p class="mb-1 lh-lg">
                                                {!! $order->address->getAddressHtml() !!}
                                            </p>
                                        </div>
                                    </div>
                                    <!-- address -->
                                    <div class="col-lg-4 col-md-4 col-12">
                                        <div class="mb-6">
                                            <h6>Order Details</h6>
                                            <p class="mb-1 lh-lg">
                                                Order ID: <span class="text-dark">{{ $order->reference_id }}</span>
                                                <br>
                                                Order Date:
                                                <span class="text-dark">{{ $order->created_at->utc() }}</span>
                                                <br>
                                                Order Total:
                                                <span class="text-dark">$ {{ number_format($order->total_price, 2) }}</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <!-- Table -->
                                    <table class="table mb-0 text-nowrap table-centered">
                                        <!-- Table Head -->
                                        <thead class="bg-light">
                                        <tr>
                                            <th>Products</th>
                                            <th class="text-end">Price</th>
                                            <th class="text-end">Quantity</th>
                                            <th class="text-end">Total</th>
                                        </tr>
                                        </thead>
                                        <!-- tbody -->
                                        <tbody>
                                        @foreach($order->items as $item)
                                            <tr>
                                                <td>
                                                    <a href="#" class="text-inherit">
                                                        <div class="d-flex align-items-center">
                                                            <div>
                                                                <img src="{{ asset($item->product->image->path) }}" alt="" class="icon-shape icon-lg">
                                                            </div>
                                                            <div class="ms-lg-4 mt-2 mt-lg-0">
                                                                <h5 class="mb-0 h6">{{ $item->product->name }}</h5>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </td>
                                                <td class="text-end font-monospace"><span class="text-body">$ {{ $item->price }}</span></td>
                                                <td class="text-end font-monospace">{{ $item->quantity }}</td>
                                                <td class="text-end font-monospace">$ {{ $item->getTotalPrice() }}</td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td colspan="1" class="fw-semibold text-dark text-end">
                                                Grand Total
                                            </td>
                                            <td class="fw-semibold text-dark text-end font-monospace">
                                                {{ $order->getTotalPrice() }}
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-6">
                            <div class="row">
                                <div class="col-md-6 mb-4 mb-lg-0">
                                    <h6>Payment Info</h6>
                                    <span>Cash on Delivery</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/page/app.js') }}"></script>
@endsection
