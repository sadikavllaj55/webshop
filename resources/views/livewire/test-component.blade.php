<div class="row">
    @foreach($products as $product)
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text">${{ $product->price }}</p>
                </div>
            </div>
        </div>
    @endforeach
</div>
