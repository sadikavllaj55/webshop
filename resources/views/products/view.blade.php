@extends('layouts.front')

@section('title')
    {{ $product->name }}
@endsection

@section('content')
    <div class="mt-4">
        <div class="container">
            <div class="row ">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Bakery Biscuits</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <section class="mt-8">
        <div class="container">
            <div class="row">
                <!-- Images -->
                <div class="col-md-6">
                    <div class="product" id="product">
                    @foreach($product->images as $image)
                        <div class="zoom" onmousemove="zoom()" style="background-image: url({{ asset($image->path) }})">
                            <img src="{{ asset($image->path) }}" alt="">
                        </div>
                    @endforeach
                    </div>
                    <div class="product-tools">
                        <div class="thumbnails row g-3" id="productThumbnails">
                        @foreach($product->images as $image)
                            <div class="col-3">
                                <div class="thumbnails-img">
                                    <img src="{{ asset($image->path) }}" alt="">
                                </div>
                            </div>
                        @endforeach
                        </div>
                    </div>
                </div>
                <!-- Content -->
                <div class="col-md-6">
                    <div class="ps-lg-10">
                        <a href="{{ route('products.index', ['cat_id' => $product->category_id ]) }}"
                           class="mb-4 d-block">{{ $product->category->name }}</a>
                        <!-- heading -->
                        <h1 class="mb-1">{{ $product->name }} </h1>
                        <div class="mb-4">
                            <div class="bs-rating" data-rating="{{ number_format($reviews->avg('rating'), 2) }}"></div>
                            <a href="#" class="ms-2">({{ $reviews->count() }} reviews)</a>
                        </div>
                        <div class="fs-4">
                            <span class="fw-bold text-dark">${{ $product->price }}</span>
                        </div>
                        <hr class="my-6">
                        <div class="mt-5 d-flex justify-content-start">
                            <div class="col-lg-2 col-3 ">
                                <div class="input-group flex-nowrap justify-content-center">
                                    <input type="button" value="-"
                                           class="button-minus form-control  text-center flex-xl-none w-xl-30 w-xxl-10 px-0"
                                           data-field="quantity">
                                    <input type="number" step="1" max="10" value="1" name="quantity"
                                           class="quantity-field form-control text-center flex-xl-none w-xl-30 w-xxl-10 px-0">
                                    <input type="button" value="+"
                                           class="button-plus form-control  text-center flex-xl-none w-xl-30  w-xxl-10 px-0"
                                           data-field="quantity">
                                </div>
                            </div>
                            <div class="ms-2 col-lg-4 col-5 d-grid">
                                <button type="button" class="add-to-cart-btn btn btn-primary">
                                    <i class="feather-icon icon-shopping-bag me-2"></i>Add to cart
                                </button>
                            </div>
                            <div class="ms-2 col-4">
                                <a class="btn btn-light" href="#" data-bs-toggle="tooltip"
                                   data-bs-html="true"
                                   title="Wishlist">
                                    <i class="feather-icon icon-heart"></i>
                                </a>
                            </div>
                        </div>
                        <hr class="my-6">
                        <div>
                            <table class="table table-borderless">
                                <tbody>
                                <tr>
                                    <td>Product Code:</td>
                                    <td>FBB00255</td>
                                </tr>
                                <tr>
                                    <td>Availability:</td>
                                    <td>In Stock</td>
                                </tr>
                                <tr>
                                    <td>Type:</td>
                                    <td>Fruits</td>
                                </tr>
                                <tr>
                                    <td>Shipping:</td>
                                    <td><small>01 day shipping.<span class="text-muted">( Free pickup today)</span></small></td>

                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-8">
                            <div class="dropdown">
                                <a class="btn btn-outline-secondary dropdown-toggle" href="#" role="button"
                                   data-bs-toggle="dropdown" aria-expanded="false">
                                    Share
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#"><i
                                                class="bi bi-facebook me-2"></i>Facebook</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="bi bi-twitter me-2"></i>Twitter</a>
                                    </li>
                                    <li><a class="dropdown-item" href="#"><i class="bi bi-instagram me-2"></i>Instagram</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Tabs -->
    <section class="mt-lg-14 mt-8 ">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="nav nav-pills nav-lb-tab" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="product-tab" data-bs-toggle="tab"
                                    data-bs-target="#product-tab-pane" type="button" role="tab"
                                    aria-controls="product-tab-pane"
                                    aria-selected="true">Product Details
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="details-tab" data-bs-toggle="tab"
                                    data-bs-target="#details-tab-pane" type="button" role="tab"
                                    aria-controls="details-tab-pane"
                                    aria-selected="false">Information
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="reviews-tab" data-bs-toggle="tab"
                                    data-bs-target="#reviews-tab-pane" type="button" role="tab"
                                    aria-controls="reviews-tab-pane"
                                    aria-selected="false">Reviews
                            </button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="product-tab-pane" role="tabpanel"
                             aria-labelledby="product-tab"
                             tabindex="0">
                            <div class="my-8">{!! $product->description !!}</div>
                        </div>
                        <div class="tab-pane fade" id="details-tab-pane" role="tabpanel" aria-labelledby="details-tab"
                             tabindex="0">
                            <div class="my-8">
                                <div class="row">
                                    <div class="col-12">
                                        <h4 class="mb-4">Details</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="reviews-tab-pane" role="tabpanel" aria-labelledby="reviews-tab" tabindex="0">
                            @include('products.product-tabs.reviews')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="my-lg-14 my-14">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3>Related Items</h3>
                </div>
            </div>
            <div class="row g-4 row-cols-lg-5 row-cols-2 row-cols-md-2 mt-2">
                <div class="col">
                    <div class="card card-product">
                        <div class="card-body">
                            <!-- badge -->

                            <div class="text-center position-relative ">
                                <div class=" position-absolute top-0 start-0">
                                    <span class="badge bg-danger">Sale</span>
                                </div>
                                <a href="#">
                                    <!-- img --><img src="assets/images/products/product-img-1.jpg"
                                                     alt="Grocery Ecommerce Template"
                                                     class="mb-3 img-fluid"></a>
                                <!-- action btn -->
                                <div class="card-product-action">
                                    <a href="#" class="btn-action" data-bs-toggle="modal"
                                       data-bs-target="#quickViewModal"><i
                                            class="bi bi-eye" data-bs-toggle="tooltip" data-bs-html="true"
                                            title="Quick View"></i></a>
                                    <a href="shop-wishlist.html" class="btn-action" data-bs-toggle="tooltip"
                                       data-bs-html="true"
                                       title="Wishlist"><i class="bi bi-heart"></i></a>
                                    <a href="#" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true"
                                       title="Compare"><i
                                            class="bi bi-arrow-left-right"></i></a>
                                </div>
                            </div>
                            <!-- heading -->
                            <div class="text-small mb-1"><a href="#" class="text-decoration-none text-muted"><small>Snack
                                        &
                                        Munchies</small></a></div>
                            <h2 class="fs-6"><a href="#" class="text-inherit text-decoration-none">Haldiram's Sev
                                    Bhujia</a></h2>
                            <div>

                                <!-- rating --> <small class="text-warning"> <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-half"></i></small> <span
                                    class="text-muted small">4.5(149)</span>
                            </div>
                            <!-- price -->
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <div><span class="text-dark">$18</span> <span
                                        class="text-decoration-line-through text-muted">$24</span>
                                </div>
                                <!-- btn -->
                                <div><a href="#" class="btn btn-primary btn-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                             viewBox="0 0 24 24" fill="none"
                                             stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                             stroke-linejoin="round"
                                             class="feather feather-plus">
                                            <line x1="12" y1="5" x2="12" y2="19"></line>
                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                        </svg>
                                        Add</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card card-product">
                        <div class="card-body">
                            <!-- badge -->
                            <div class="text-center position-relative"><a href="#"><img
                                        src="assets/images/products/product-img-2.jpg"
                                        alt="Grocery Ecommerce Template"
                                        class="mb-3 img-fluid"></a>
                                <!-- action btn -->
                                <div class="card-product-action">
                                    <a href="#" class="btn-action" data-bs-toggle="modal"
                                       data-bs-target="#quickViewModal"><i
                                            class="bi bi-eye" data-bs-toggle="tooltip" data-bs-html="true"
                                            title="Quick View"></i></a>
                                    <a href="#" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true"
                                       title="Wishlist"><i
                                            class="bi bi-heart"></i></a>
                                    <a href="#" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true"
                                       title="Compare"><i
                                            class="bi bi-arrow-left-right"></i></a>
                                </div>
                            </div>
                            <!-- heading -->
                            <div class="text-small mb-1"><a href="#" class="text-decoration-none text-muted"><small>Bakery
                                        &
                                        Biscuits</small></a></div>
                            <h2 class="fs-6"><a href="#" class="text-inherit text-decoration-none">NutriChoice
                                    Digestive </a></h2>
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
                                <div><span class="text-dark">$24</span>
                                </div>
                                <!-- btn -->
                                <div><a href="#" class="btn btn-primary btn-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                             viewBox="0 0 24 24" fill="none"
                                             stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                             stroke-linejoin="round"
                                             class="feather feather-plus">
                                            <line x1="12" y1="5" x2="12" y2="19"></line>
                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                        </svg>
                                        Add</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card card-product">
                        <div class="card-body">
                            <!-- badge -->
                            <div class="text-center position-relative"><a href="#"><img
                                        src="assets/images/products/product-img-3.jpg"
                                        alt="Grocery Ecommerce Template"
                                        class="mb-3 img-fluid"></a>
                                <!-- action btn -->
                                <div class="card-product-action">
                                    <a href="#" class="btn-action" data-bs-toggle="modal"
                                       data-bs-target="#quickViewModal"><i
                                            class="bi bi-eye" data-bs-toggle="tooltip" data-bs-html="true"
                                            title="Quick View"></i></a>
                                    <a href="#" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true"
                                       title="Wishlist"><i
                                            class="bi bi-heart"></i></a>
                                    <a href="#" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true"
                                       title="Compare"><i
                                            class="bi bi-arrow-left-right"></i></a>
                                </div>
                            </div>
                            <!-- heading -->
                            <div class="text-small mb-1"><a href="#" class="text-decoration-none text-muted"><small>Bakery
                                        &
                                        Biscuits</small></a></div>
                            <h2 class="fs-6"><a href="#" class="text-inherit text-decoration-none">Cadbury 5 Star
                                    Chocolate</a></h2>
                            <div class="text-warning">

                                <small> <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i></small> <span
                                    class="text-muted small">5 (469)</span>
                            </div>
                            <!-- price -->
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <div><span class="text-dark">$32</span> <span
                                        class="text-decoration-line-through text-muted">$35</span>
                                </div>
                                <!-- btn -->
                                <div><a href="#" class="btn btn-primary btn-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                             viewBox="0 0 24 24" fill="none"
                                             stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                             stroke-linejoin="round"
                                             class="feather feather-plus">
                                            <line x1="12" y1="5" x2="12" y2="19"></line>
                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                        </svg>
                                        Add</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card card-product">
                        <div class="card-body">
                            <!-- badge -->
                            <div class="text-center position-relative"><a href="#"><img
                                        src="assets/images/products/product-img-4.jpg"
                                        alt="Grocery Ecommerce Template"
                                        class="mb-3 img-fluid"></a>
                                <!-- action btn -->
                                <div class="card-product-action">
                                    <a href="#" class="btn-action" data-bs-toggle="modal"
                                       data-bs-target="#quickViewModal"><i
                                            class="bi bi-eye" data-bs-toggle="tooltip" data-bs-html="true"
                                            title="Quick View"></i></a>
                                    <a href="#" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true"
                                       title="Wishlist"><i
                                            class="bi bi-heart"></i></a>
                                    <a href="#" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true"
                                       title="Compare"><i
                                            class="bi bi-arrow-left-right"></i></a>
                                </div>
                            </div>
                            <!-- heading -->
                            <div class="text-small mb-1"><a href="#" class="text-decoration-none text-muted"><small>Snack
                                        &
                                        Munchies</small></a></div>
                            <h2 class="fs-6"><a href="#" class="text-inherit text-decoration-none">Onion Flavour
                                    Potato</a></h2>
                            <div class="text-warning">

                                <small> <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-half"></i>
                                    <i class="bi bi-star"></i></small> <span class="text-muted small">3.5 (456)</span>
                            </div>
                            <!-- price -->
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <div><span class="text-dark">$3</span> <span
                                        class="text-decoration-line-through text-muted">$5</span>
                                </div>
                                <!-- btn -->
                                <div><a href="#" class="btn btn-primary btn-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                             viewBox="0 0 24 24" fill="none"
                                             stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                             stroke-linejoin="round"
                                             class="feather feather-plus">
                                            <line x1="12" y1="5" x2="12" y2="19"></line>
                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                        </svg>
                                        Add</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card card-product">
                        <div class="card-body">
                            <!-- badge -->
                            <div class="text-center position-relative"><a href="#"><img
                                        src="assets/images/products/product-img-9.jpg"
                                        alt="Grocery Ecommerce Template"
                                        class="mb-3 img-fluid"></a>
                                <!-- action btn -->
                                <div class="card-product-action">
                                    <a href="#" class="btn-action" data-bs-toggle="modal"
                                       data-bs-target="#quickViewModal"><i
                                            class="bi bi-eye" data-bs-toggle="tooltip" data-bs-html="true"
                                            title="Quick View"></i></a>
                                    <a href="#" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true"
                                       title="Wishlist"><i
                                            class="bi bi-heart"></i></a>
                                    <a href="#" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true"
                                       title="Compare"><i
                                            class="bi bi-arrow-left-right"></i></a>
                                </div>
                            </div>
                            <!-- heading -->
                            <div class="text-small mb-1"><a href="#" class="text-decoration-none text-muted"><small>Snack
                                        &
                                        Munchies</small></a></div>
                            <h2 class="fs-6"><a href="#" class="text-inherit text-decoration-none">Slurrp Millet
                                    Chocolate </a></h2>
                            <div class="text-warning">

                                <small> <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-half"></i></small> <span
                                    class="text-muted small">4.5 (67)</span>
                            </div>
                            <!-- price -->
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <div><span class="text-dark">$6</span> <span
                                        class="text-decoration-line-through text-muted">$10</span>
                                </div>
                                <!-- btn -->
                                <div><a href="#" class="btn btn-primary btn-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                             viewBox="0 0 24 24" fill="none"
                                             stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                             stroke-linejoin="round"
                                             class="feather feather-plus">
                                            <line x1="12" y1="5" x2="12" y2="19"></line>
                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                        </svg>
                                        Add</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/page/app.js') }}"></script>
@endsection
