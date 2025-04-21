@extends('layouts.front')


@section('content')
<!-- main wrapper -->
<section class="mb-lg-14 mb-8 mt-8">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-12">
                <div class="d-flex justify-content-between mb-5">
                    <!-- heading -->
                    <div>
                        <h5 class="h6 mb-1" id="addAddressModalLabel">New Shipping Address</h5>
                        <p class="small mb-0">Add new shipping address for your order delivery.</p>
                    </div>
                </div>
                <!-- row -->
                <form method="post" action="{{ route('order.store') }}">
                    <div class="row g-3">
                        <div class="mt-5">
                            <div>
                                <div class="card card-bordered shadow-none mb-2">
                                    <!-- card body -->
                                    <div class="card-body p-6">
                                        <div class="d-flex mb-4">
                                            <div>
                                                <h5 class="mb-1 h6"> Credit / Debit Card</h5>
                                                <p class="mb-0 small">Safe money transfer using your bank accou k account. We support
                                                    Mastercard tercard, Visa, Discover and Stripe.</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <!-- input -->
                                                <div class="mb-3">
                                                    <label class="form-label">Card Number</label>
                                                    <input type="text" class="form-control" placeholder="1234 4567 6789 4321" name="card_number" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <!-- input -->
                                                <div class="mb-3 mb-lg-0">
                                                    <label class="form-label">Name on card </label>
                                                    <input type="text" class="form-control" placeholder="Enter your first name" name="card_name" required>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-12">
                                                <!-- input -->
                                                <div class="mb-3  mb-lg-0 position-relative">
                                                    <label class="form-label">Expiry date </label>
                                                    <input class="form-control flatpickr " type="text" placeholder="Select Date">
                                                    <div class="position-absolute bottom-0 end-0 p-3 lh-1">
                                                        <i class="bi bi-calendar text-muted"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-12">
                                                <!-- input -->
                                                <div class="mb-3  mb-lg-0">
                                                    <label class="form-label">CVV code </label>
                                                    <input type="text" class="form-control" placeholder="312" name="cvv" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <!-- col -->

                        @csrf
                        <div class="col-12">
                            <input type="text" name="first_name" class="form-control" placeholder="First name" required>
                        </div>

                        <div class="col-12">
                            <input type="text" name="last_name" class="form-control" placeholder="Last name" required>
                        </div>

                        <div class="col-12">
                            <input type="text" name="address_line_1" class="form-control" placeholder="Address Line 1" required>
                        </div>

                        <div class="col-12">
                            <input type="text" name="address_line_2" class="form-control" placeholder="Address Line 2">
                        </div>

                        <div class="col-12">
                            <input type="text" name="city" class="form-control" placeholder="City" required>
                        </div>

                        <div class="col-12">
                            <input type="text" name="state" class="form-control" placeholder="State" required>
                        </div>

                        <div class="col-12">
                            <input type="text" name="country" class="form-control" placeholder="Country" required>
                        </div>

                        <div class="col-12">
                            <input type="text" name="zip_code" class="form-control" placeholder="Zip Code" required>
                        </div>
                        <div class="col-12 text-end">
                            <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Cancel</button>
                            <button class="btn btn-primary" type="submit">Save Address</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-12 col-md-12 offset-lg-1 col-lg-4">
                <div class="mt-4 mt-lg-0">
                    <div class="card shadow-sm">
                        <h5 class="px-6 py-4 bg-transparent mb-0">Order Details</h5>
                        <ul class="list-group list-group-flush">
                            <!-- list group item -->
                            @php $i = 1; @endphp
                            @foreach($items as $item)
                            <li class="list-group-item px-4 py-3">
                                <div class="row align-items-center">
                                    <div class="col-2 col-md-2">
                                        {{ $i++ }}</div>
                                    <div class="col-5 col-md-5">
                                        <h6 class="mb-0">{{ $item->product->name }}</h6>
                                        <span><small class="text-muted">${{ $item->price }}</small></span>

                                    </div>
                                    <div class="col-2 col-md-1 text-center text-muted">
                                        <span>{{ $item->quantity }}</span>

                                    </div>
                                    <div class="col-3 text-lg-end text-start text-md-end col-md-4">
                                        <span class="fw-bold">${{ $item->itemsprice }}</span>

                                    </div>
                                </div>
                            </li>
                            @endforeach
                            <!-- list group item -->
                            <li class="list-group-item px-4 py-3">
                                <div class="d-flex align-items-center justify-content-between fw-bold">
                                    <div>
                                       Total
                                    </div>
                                    <div>
                                        $ {{ $totalPrice }}
                                    </div>

                                </div>
                            </li>

                        </ul>

                    </div>


                </div>
            </div>
        </div>
    </div>
</section>
<script src="{{ asset('assets/js/flatpickr.min.js') }}"></script>

@endsection

