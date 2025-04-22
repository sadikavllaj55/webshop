<div class="row g-3">
    <div class="col-6">
        <input type="text" value="{{ old('first_name') }}" class="form-control @error('first_name') is-invalid @enderror" placeholder="First name" name="first_name">
        @error('first_name')<small class="invalid-feedback">{{ $errors->first('first_name') }}</small>@enderror
    </div>
    <div class="col-6">
        <input type="text" value="{{ old('last_name') }}" class="form-control @error('last_name') is-invalid @enderror" placeholder="Last name" name="last_name" aria-label="Last name">
        @error('last_name')<small class="invalid-feedback">{{ $errors->first('last_name') }}</small>@enderror
    </div>
    <div class="col-12">
        <input type="text" value="{{ old('address') }}" class="form-control @error('address') is-invalid @enderror" placeholder="Address Line 1" name="address">
        @error('address')<small class="invalid-feedback">{{ $errors->first('address') }}</small>@enderror
    </div>
    <div class="col-12">
        <input type="text" value="{{ old('address2') }}" class="form-control @error('address2') is-invalid @enderror" placeholder="Address Line 2" name="address2">
        @error('address2')<small class="invalid-feedback">{{ $errors->first('address2') }}</small>@enderror
    </div>
    <div class="col-6">
        <select class="form-select @error('country') is-invalid @enderror" name="country" id="country">
            <option selected value>Select Country</option>
            @foreach($countries as $code => $country)
                <option value="{{ $code }}" @if(old('country') == $code) selected @endif>{{ $country }}</option>
            @endforeach
        </select>
        @error('country')<small class="invalid-feedback">{{ $errors->first('country') }}</small>@enderror
    </div>
    <div class="col-6">
        <input type="text" value="{{ old('city') }}" class="form-control" placeholder="City" name="city">
        @error('city')<small class="invalid-feedback">{{ $errors->first('city') }}</small>@enderror
    </div>
    <div class="col-6">
        <input type="text" class="form-control" placeholder="State" name="state">
    </div>
    <div class="col-6">
        <input type="text" value="{{ old('postal_code') }}" class="form-control" placeholder="Postal Code" name="postal_code" id="postal_code">
        @error('postal_code')<small class="invalid-feedback">{{ $errors->first('postal_code') }}</small>@enderror
    </div>
    <hr>
    <div class="col-6">
        <input type="email" class="form-control" placeholder="Email" name="customer_email">
    </div>
    <div class="col-6">
        <input type="tel" class="form-control" placeholder="Phone Nr." name="customer_phone">
    </div>
    {{--<div class="col-12 text-end">
        <button class="btn btn-primary" type="button">Save Address</button>
    </div>--}}
</div>
