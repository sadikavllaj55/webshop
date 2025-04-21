@extends('layouts.front')


@section('content')
<main class="main-content-wrapper">
    <!-- container -->
    <div class="container">
        <div class="d-flex justify-content-between mb-5">
            <!-- heading -->
            <div>
                <h5 class="h6 mb-1" id="addAddressModalLabel">Shipping Address</h5>
                <p class="small mb-0">Add shipping address for your order delivery.</p>
            </div>
        </div>

        <div class="row g-3">
            <form method="post" action="{{ route('save.address') }}">
                @csrf
                <div class="col-12">
                    <input type="text" name="first_name" class="form-control" placeholder="First name" required>
                </div>

                <div class="col-12">
                    <input type="text" name="last_name" class="form-control" placeholder="Last name" required>
                </div>

                <div class="col-12">
                    <input type="text" name="address_line" class="form-control" placeholder="Address Line 1">
                </div>

                <div class="col-12">
                    <input type="text" name="city" class="form-control" placeholder="City">
                </div>

                <div class="col-12">
                    <input type="text" name="state" class="form-control" placeholder="State">
                </div>

                <div class="col-12">
                    <input type="text" name="country" class="form-control" placeholder="Country">
                </div>

                <div class="col-12">
                    <input type="text" name="zip_code" class="form-control" placeholder="Zip Code">
                </div>

                <div class="col-12 text-end">
                    <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary" type="submit">Save Address</button>
                </div>
            </form>
        </div>
    </div>
</main>


@endsection
