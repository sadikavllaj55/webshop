<div>
    <div class="card card-bordered shadow-none mb-2">
        <div class="card-body p-6">
            <div class="d-flex mb-4">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="payment_type" value="credit_card" id="credit_card" checked>
                </div>
                <div>
                    <label class="mb-1 h6" for="credit_card">Credit / Debit Card</label>
                    <p class="mb-0 small">Safe money transfer using your bank account.
                        We support Mastercard, Visa, Discover and Stripe.</p>
                </div>
            </div>
            <div class="row g-2" data-payment-inputs="credit_card">
                <div class="col-12">
                    <div class="mb-3">
                        <label for="card_nr" class="form-label">Card Number</label>
                        <input type="text" value="{{ old('card_nr') }}" class="form-control @error('card_nr') is-invalid @enderror" name="card_nr" id="card_nr" placeholder="XXXX XXXX XXXX XXXX">
                        @error('card_nr')<small class="invalid-feedback">{{ $errors->first('card_nr') }}</small>@enderror
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="mb-3 mb-lg-0">
                        <label class="form-label" for="card_name">Name on card</label>
                        <input type="text" value="{{ old('card_name') }}" class="form-control @error('card_name') is-invalid @enderror" placeholder="Enter name" name="card_name" id="card_name">
                        @error('card_name')<small class="invalid-feedback">{{ $errors->first('card_name') }}</small>@enderror
                    </div>
                </div>
                <div class="col-md-3 col-12">
                    <div class="mb-3 mb-lg-0 position-relative">
                        <label class="form-label" for="card_expiry">Expiry date</label>
                        <input type="text" value="{{ old('card_expiry') }}" class="form-control @error('card_expiry') is-invalid @enderror" name="card_expiry" id="card_expiry" placeholder="MM/YY">
                        @error('card_expiry')<small class="invalid-feedback">{{ $errors->first('card_expiry') }}</small>@enderror
                    </div>
                </div>
                <div class="col-md-3 col-12">
                    <div class="mb-3 mb-lg-0">
                        <label for="card_cvc" class="form-label">CVV Code</label>
                        <input type="password" class="form-control @error('card_cvc') is-invalid @enderror" name="card_cvc" id="card_cvc" placeholder="XXX" maxlength="3" inputmode="numeric">
                        @error('card_cvc')<small class="invalid-feedback">{{ $errors->first('card_cvc') }}</small>@enderror
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card card-bordered shadow-none">
        <div class="card-body p-6">
            <div class="d-flex">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="payment_type" value="paypal" id="paypal">
                    <label class="form-check-label ms-2" for="paypal"></label>
                </div>
                <div>
                    <label class="mb-1 h6" for="paypal">Payment with Paypal</label>
                    <p class="mb-0 small">You will be redirected to
                        PayPal
                        website to complete your purchase
                        securely.</p>
                </div>
            </div>
        </div>
    </div>
</div>
