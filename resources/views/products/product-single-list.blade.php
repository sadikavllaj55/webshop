<div class="col">
    <div class="card card-product">
        <div class="card-body">
            <div class="row align-items-center">
                <div class="col-md-4 col-12">
                    <div class="text-center position-relative">
                        <a href="/products/{{ $product->id }}">
                            <img src="{{ asset($product->image_path) }}" alt="{{ $product->name }}" class="mb-3 img-fluid">
                        </a>
                    </div>
                </div>
                <div class="col-md-8 col-12 flex-grow-1">
                    <!-- heading -->
                    <div class="text-small mb-1">
                        <a href="#" class="text-decoration-none text-muted">
                            <small>{{ $product->category }}</small>
                        </a>
                    </div>
                    <h2 class="fs-6">
                        <a href="/products/{{ $product->id }}" class="text-inherit text-decoration-none">{{ $product->name }}</a>
                    </h2>
                    <div>
                        <!-- rating -->
                        <small class="text-warning">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-half"></i>
                            <i class="bi bi-star"></i>
                        </small>
                        <span class="text-muted small">{{ number_format($product->rating, 2) }}({{ $product->total_reviews }})</span>
                    </div>
                    <div class="mt-6">
                        <div>
                            <span class="text-dark">${{ $product->price }}</span>
                        </div>
                        <!-- btn -->
                        <div class="mt-3">
                            <a href="#" class="wishlist-btn btn btn-icon btn-sm btn-outline-gray-400 text-muted" data-bs-toggle="tooltip" data-bs-html="true" aria-label="Wishlist" data-bs-original-title="Wishlist">
                                <i class="bi bi-heart"></i>
                            </a>
                        </div>
                        <!-- btn -->
                        <div class="mt-2">
                            <button type="button" class="btn btn-primary btn-sm add-cart"
                                    data-product="{{ $product->id }}" data-operation="add">
                                <i class="bi bi-plus-lg"></i> Add to Cart
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
