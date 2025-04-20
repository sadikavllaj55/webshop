<?php
/**
 * @var \App\Models\Product $product
 * @var array $ratings_count
 */
?>
<div class="my-8">
    <div class="row">
        <div class="col-md-4">
            <div class="me-lg-12 mb-6 mb-md-0">
                <div class="mb-5">
                    <!-- title -->
                    <h4 class="mb-3">Customer reviews</h4>
                    <div>
                        <span class="bs-rating" data-rating="{{ number_format($product->reviews->avg('rating'), 2) }}"></span>
                        <span class="ms-3">{{ number_format($product->reviews->avg('rating'), 2) }} out of 5</span>
                        <div class="ms-3">
                            <small>{{ $product->reviews->count() }} ratings</small>
                        </div>
                    </div>
                </div>
                <div class="mb-8">
                @foreach(range(5, 1, -1) as $stars)
                    @php
                        $percentage = (int)(($ratings_count[$stars] * 100) / $product->reviews->count());
                    @endphp
                    <div class="d-flex align-items-center mb-2">
                        <div class="text-nowrap me-3 text-muted">
                            <span class="d-inline-block align-middle text-muted">{{ $stars }}</span>
                            <i class="bi bi-star-fill ms-1 small text-warning"></i>
                        </div>
                        <div class="w-100">
                            <div class="progress" style="height: 6px;">
                                <div class="progress-bar bg-warning" role="progressbar"
                                     style="width: {{ $percentage }}%;"
                                     aria-valuenow="{{ $percentage }}"
                                     aria-valuemin="0"
                                     aria-valuemax="100">
                                </div>
                            </div>
                        </div>
                        <span class="text-muted ms-3">{{ $percentage }}%</span>
                    </div>
                @endforeach
                </div>
                <div class="d-grid">
                    <h4>Review this product</h4>
                    <p class="mb-0">Share your thoughts with other customers.</p>
                    <a href="#" class="btn btn-outline-gray-400 mt-4 text-muted" data-bs-toggle="modal" data-bs-target="#productReviewModal">Write the Review</a>
                </div>
            </div>
        </div>
        <!-- col -->
        <div class="col-md-8">
            <div class="mb-10">
                <div class="d-flex justify-content-between align-items-center mb-8">
                    <div>
                        <h4>Reviews</h4>
                    </div>
                    <div>
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Top Review</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                </div>
                @forelse($reviews as $review)
                    <div class="d-flex border-bottom pb-6 mb-6 review-row">
                        <img src="{{ asset($review->author?->avatar) }}" alt="" class="rounded-circle avatar-lg">
                        <div class="ms-5 flex-fill">
                            <h6 class="mb-1">{{ $review->author?->name }}</h6>
                            <p class="small"><span class="text-muted">{{ $review->created_at->longRelativeDiffForHumans() }}</span>
                                <span class="text-primary ms-3 fw-bold">Verified Purchase</span>
                            </p>
                            <div class="mb-2">
                                <span class="bs-rating text-warning" data-rating="{{ $review->rating }}"></span>
                                <span class="ms-3 text-dark fw-bold">
                                    {{ $review->title }}
                                </span>
                            </div>
                            <div class="w-full">
                                <p>{{ $review->comment }}</p>
                            </div>
                            <div class="d-flex justify-content-end mt-4">
                                <a href="#" class="text-muted">
                                    <i class="feather-icon icon-thumbs-up me-1"></i>Helpful
                                </a>
                                <a href="#" class="text-muted ms-4">
                                    <i class="feather-icon icon-flag me-2"></i>Report abuse
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="alert alert-warning">No reviews</div>
                @endforelse
                <div class="row mt-8">
                    <div class="col">
                        <nav>{{ $reviews->links() }}</nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
