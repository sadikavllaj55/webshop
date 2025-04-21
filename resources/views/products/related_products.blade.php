<?php
/**
 * @var \App\Models\Product $product
 */

?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <h3>Related Items</h3>
        </div>
    </div>
    <div class="row g-4 row-cols-lg-5 row-cols-2 row-cols-md-2 mt-2">
        @foreach($product->relatedProducts() as $rel_prod)
            <div class="col">
                <div class="card card-product">
                    <div class="card-body">
                        <div class="text-center position-relative">
                            <a href="{{ route('products.show', $rel_prod->id) }}">
                                <img src="{{ asset($rel_prod->image->path) }}" alt="{{ $rel_prod->name }}" class="mb-3 img-fluid">
                            </a>
                            <!-- action btn -->
                            <div class="card-product-action">
                                <a href="#" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true"
                                   title="Wishlist"><i class="bi bi-heart"></i></a>
                            </div>
                        </div>
                        <!-- heading -->
                        <div class="text-small mb-1">
                            <a href="#" class="text-decoration-none text-muted">
                                <small>{{ $rel_prod->category->name }}</small>
                            </a>
                        </div>
                        <h2 class="fs-6">
                            <a href="#" class="text-inherit text-decoration-none">{{ $rel_prod->name }}</a>
                        </h2>
                        <div class="text-warning">
                            <small> <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-half"></i></small> <span
                                class="text-muted small">4.5 (25)</span>
                        </div>
                        <!-- price -->
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <div><span class="text-dark">${{ $rel_prod->price }}</span>
                            </div>
                            <!-- btn -->
                            <div>
                                <a href="#" data-product="{{ $rel_prod->id }}" class="add-cart btn btn-primary btn-sm">
                                    <i class="bi bi-plus-lg"></i> Add
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
