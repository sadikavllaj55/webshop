<div class="col">
    <div class="card card-product">
        <div class="card-body">
            <div class="text-center position-relative">
                <a href="{{ route('products.show', $product->id) }}">
                    <img src="{{ asset($product->image_path) }}" class="mb-3 img-fluid"
                         alt="{{ $product->name }}">
                </a>
                <div class="card-product-action">
                    <a href="#" class="wishlist-btn btn-action" data-bs-toggle="tooltip" data-bs-html="true" title="Wishlist"><i class="bi bi-heart"></i></a>
                </div>
            </div>
            <!-- heading -->
            <div class="text-small mb-1">
                <a href="{{ route('products.index', ['cat_id' => $product->category_id]) }}" class="text-decoration-none text-muted">
                    <small>{{ $product->category }}</small>
                </a>
            </div>
            <h2 class="fs-6">
                <a href="{{ route('products.show', $product->id) }}" class="text-inherit text-decoration-none">{{ $product->name }}</a>
            </h2>
            <!-- rating -->
            <div>
                <span class="bs-rating" data-rating="{{ number_format($product->rating, 2) }}"></span>
                <span class="text-muted small">{{ number_format($product->rating, 2) }}({{ $product->total_reviews }})</span>
            </div>
            <!-- price -->
            <div class="d-flex justify-content-between align-items-center mt-3">
                <div>
                    <span class="text-dark">${{ $product->price }}</span>
                </div>
                <div>
                    <button type="button" class="btn btn-primary btn-sm add-cart"
                       data-product="{{ $product->id }}" data-operation="add">
                        <i class="bi bi-plus-lg"></i> Add
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

