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
                            <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Shop</a></li>
                            @if($product->category->parent)
                            <li class="breadcrumb-item">
                                <a href="{{ route('products.index', ['cat_id' => $product->category->parent->id]) }}">
                                    {{ $product->category->parent->name }}
                                </a>
                            </li>
                            @endif
                            <li class="breadcrumb-item">
                                <a href="{{ route('products.index', ['cat_id' => $product->category_id]) }}">
                                    {{ $product->category->name }}
                                </a>
                            </li>
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
                            <div class="zoom" onmousemove="zoom()"
                                 style="background-image: url({{ asset($image->path) }})">
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
                                <button type="button" class="add-cart btn btn-primary"
                                        data-product="{{ $product->id }}">
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
                                    <td><small>01 day shipping.<span
                                                    class="text-muted">( Free pickup today)</span></small></td>

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
                        <div class="tab-pane fade" id="reviews-tab-pane" role="tabpanel" aria-labelledby="reviews-tab"
                             tabindex="0">
                            @include('products.product-tabs.reviews')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="my-lg-14 my-14">
        @include('products.related_products')
    </section>
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/page/app.js') }}"></script>
@endsection
