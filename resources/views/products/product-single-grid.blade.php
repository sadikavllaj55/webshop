<div class="col">
    <div class="card card-product">
        <div class="card-body">
            <div class="text-center position-relative">
                <a href="#">
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
                <small class="product-rating" data-rating="{{ number_format($product->rating, 2) }}"></small>
                <span class="text-muted small">{{ number_format($product->rating, 2) }}({{ $product->total_reviews }})</span>
            </div>
            <!-- price -->
            <div class="d-flex justify-content-between align-items-center mt-3">
                <div>
                    <span class="text-dark">${{ $product->price }}</span>
                </div>
                <div>
                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary btn-sm add-to-cart-btn" data-product="{{ $product->id }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                             viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round"
                             stroke-linejoin="round"
                             class="feather feather-plus">
                            <line x1="12" y1="5" x2="12" y2="19"></line>
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                        </svg>
                        Add
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

