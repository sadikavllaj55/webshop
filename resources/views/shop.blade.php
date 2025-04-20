@extends('layouts.front')

@section('content')
    <section class=" mt-8 mb-lg-14 mb-8">
        <div class="container">
            <div class="row gx-10">
                <!-- Filters -->
                <div class="col-lg-3 col-md-4 mb-6 mb-md-0">
                    <div class="py-4">
                        <!-- title -->
                        <h5 class="mb-3">Categories</h5>
                        <!-- nav -->
                        <ul class="nav nav-category" id="categoryCollapseMenu">
                            @foreach($categories as $cat)
                                <li class="nav-item border-bottom w-100 collapsed" data-bs-toggle="collapse" data-bs-target="#category{{ $cat->id }}" aria-expanded="false" aria-controls="categorycategory{{ $cat->id }}">
                                    <a href="#" class="nav-link">{{ $cat->name }} @if($cat->children)<i class="feather-icon icon-chevron-right"></i>@endif</a>
                                    @if($cat->children)
                                    <div id="category{{ $cat->id }}" class="accordion-collapse collapse" data-bs-parent="#categoryCollapseMenu">
                                        <div>
                                            <ul class="nav flex-column ms-3">
                                                @foreach($cat->children as $subcat)
                                                <li class="nav-item"><a href="#" class="nav-link">{{ $subcat->name }}</a></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="py-4">
                        <h5 class="mb-3">Stores</h5>
                        <div class="my-4">
                            <!-- input -->
                            <input type="search" class="form-control" placeholder="Search by store">
                        </div>
                        <!-- form check -->
                        <div class="form-check mb-2">
                            <!-- input -->
                            <input class="form-check-input" type="checkbox" value="" id="eGrocery" checked>
                            <label class="form-check-label" for="eGrocery">
                                E-Grocery
                            </label>
                        </div>
                        <!-- form check -->
                        <div class="form-check mb-2">
                            <!-- input -->
                            <input class="form-check-input" type="checkbox" value="" id="DealShare">
                            <label class="form-check-label" for="DealShare">
                                DealShare
                            </label>
                        </div>
                        <!-- form check -->
                        <div class="form-check mb-2">
                            <!-- input -->
                            <input class="form-check-input" type="checkbox" value="" id="Dmart">
                            <label class="form-check-label" for="Dmart">
                                DMart
                            </label>
                        </div>
                        <!-- form check -->
                        <div class="form-check mb-2">
                            <!-- input -->
                            <input class="form-check-input" type="checkbox" value="" id="Blinkit">
                            <label class="form-check-label" for="Blinkit">
                                Blinkit
                            </label>
                        </div>
                        <!-- form check -->
                        <div class="form-check mb-2">
                            <!-- input -->
                            <input class="form-check-input" type="checkbox" value="" id="BigBasket">
                            <label class="form-check-label" for="BigBasket">
                                BigBasket
                            </label>
                        </div>
                        <!-- form check -->
                        <div class="form-check mb-2">
                            <!-- input -->
                            <input class="form-check-input" type="checkbox" value="" id="StoreFront">
                            <label class="form-check-label" for="StoreFront">
                                StoreFront
                            </label>
                        </div>
                        <!-- form check -->
                        <div class="form-check mb-2">
                            <!-- input -->
                            <input class="form-check-input" type="checkbox" value="" id="Spencers">
                            <label class="form-check-label" for="Spencers">
                                Spencers
                            </label>
                        </div>
                        <!-- form check -->
                        <div class="form-check mb-2">
                            <!-- input -->
                            <input class="form-check-input" type="checkbox" value="" id="onlineGrocery">
                            <label class="form-check-label" for="onlineGrocery">
                                Online Grocery
                            </label>
                        </div>

                    </div>
                    <div class="py-4">
                        <!-- price -->
                        <h5 class="mb-3">Price</h5>
                        <div>
                            <!-- range -->
                            <div id="priceRange" class="mb-3"></div>
                            <small class="text-muted">Price:</small> <span id="priceRange-value" class="small"></span>

                        </div>


                    </div>
                    <!-- rating -->
                    <div class="py-4">

                        <h5 class="mb-3">Rating</h5>
                        <div>
                            <!-- form check -->
                            <div class="form-check mb-2">
                                <!-- input -->
                                <input class="form-check-input" type="checkbox" value="" id="ratingFive">
                                <label class="form-check-label" for="ratingFive">
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning "></i>
                                    <i class="bi bi-star-fill text-warning "></i>
                                    <i class="bi bi-star-fill text-warning "></i>
                                    <i class="bi bi-star-fill text-warning "></i>
                                </label>
                            </div>
                            <!-- form check -->
                            <div class="form-check mb-2">
                                <!-- input -->
                                <input class="form-check-input" type="checkbox" value="" id="ratingFour" checked>
                                <label class="form-check-label" for="ratingFour">
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning "></i>
                                    <i class="bi bi-star-fill text-warning "></i>
                                    <i class="bi bi-star-fill text-warning "></i>
                                    <i class="bi bi-star text-warning"></i>
                                </label>
                            </div>
                            <!-- form check -->
                            <div class="form-check mb-2">
                                <!-- input -->
                                <input class="form-check-input" type="checkbox" value="" id="ratingThree">
                                <label class="form-check-label" for="ratingThree">
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning "></i>
                                    <i class="bi bi-star-fill text-warning "></i>
                                    <i class="bi bi-star text-warning"></i>
                                    <i class="bi bi-star text-warning"></i>
                                </label>
                            </div>
                            <!-- form check -->
                            <div class="form-check mb-2">
                                <!-- input -->
                                <input class="form-check-input" type="checkbox" value="" id="ratingTwo">
                                <label class="form-check-label" for="ratingTwo">
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star text-warning"></i>
                                    <i class="bi bi-star text-warning"></i>
                                    <i class="bi bi-star text-warning"></i>
                                </label>
                            </div>
                            <!-- form check -->
                            <div class="form-check mb-2">
                                <!-- input -->
                                <input class="form-check-input" type="checkbox" value="" id="ratingOne">
                                <label class="form-check-label" for="ratingOne">
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star text-warning"></i>
                                    <i class="bi bi-star text-warning"></i>
                                    <i class="bi bi-star text-warning"></i>
                                    <i class="bi bi-star text-warning"></i>
                                </label>
                            </div>
                        </div>


                    </div>
                    <div class="py-4">
                        <!-- Banner Design -->
                        <!-- Banner Content -->
                        <div class="position-absolute p-5 py-8">
                            <h3 class="mb-0">Fresh Fruits </h3>
                            <p>Get Upto 25% Off</p>
                            <a href="product_filter.html" class="btn btn-dark">Shop Now<i
                                    class="feather-icon icon-arrow-right ms-1"></i></a>
                        </div>
                        <!-- Banner Content -->
                        <!-- Banner Image -->
                        <!-- img --><img src="assets/images/assortment-citrus-fruits.png" alt=""
                                         class="img-fluid rounded-3">
                        <!-- Banner Image -->
                    </div>
                    <!-- Banner Design -->
                </div>
                <!-- Products -->
                <div class="col-lg-9 col-md-8">
                    <!-- card -->
                    <div class="card mb-4 bg-light border-0">
                        <!-- card body -->
                        <div class=" card-body p-9">
                            <h1 class="mb-0">Snacks & Munchies</h1>
                        </div>
                    </div>
                    <!-- list icon -->
                    <div class="d-md-flex justify-content-between align-items-center">
                        <div>
                            <p class="mb-3 mb-md-0"><span class="text-dark">24 </span> Products found </p>
                        </div>
                        <!-- icon -->
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="product_filter.html" class="text-muted me-3"><i class="bi bi-list-ul"></i></a>
                            <a href="cart_list.html" class=" me-3 active"><i class="bi bi-grid"></i></a>
                            <a href="#" class="me-3 text-muted"><i class="bi bi-grid-3x3-gap"></i></a>
                            <div class="me-2">
                                <!-- select option -->
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>Show: 50</option>
                                    <option value="10">10</option>
                                    <option value="20">20</option>
                                    <option value="30">30</option>
                                </select></div>
                            <div>
                                <!-- select option -->
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>Sort by: Featured</option>
                                    <option value="Low to High">Price: Low to High</option>
                                    <option value="High to Low"> Price: High to Low</option>
                                    <option value="Release Date"> Release Date</option>
                                    <option value="Avg. Rating"> Avg. Rating</option>

                                </select></div>
                        </div>
                    </div>
                    <!-- row -->
                    <div class="row g-4 row-cols-xl-4 row-cols-lg-3 row-cols-2 row-cols-md-2 mt-2">
                        <div class="col">
                            <!-- card -->
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
                                    <div class="text-small mb-1"><a href="#"
                                                                    class="text-decoration-none text-muted"><small>Snack
                                                &
                                                Munchies</small></a></div>
                                    <h2 class="fs-6"><a href="#" class="text-inherit text-decoration-none">Haldiram's
                                            Sev
                                            Bhujia</a></h2>
                                    <div>
                                        <!-- rating -->
                                        <small class="text-warning"> <i class="bi bi-star-fill"></i>
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
                            <!-- card -->
                            <div class="card card-product">
                                <div class="card-body">
                                    <!-- badge -->
                                    <div class="text-center position-relative">
                                        <div class=" position-absolute top-0 start-0">
                                            <span class="badge bg-success">14%</span>
                                        </div>

                                        <a href="#">
                                            <!-- img --><img src="assets/images/products/product-img-2.jpg"
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
                                    <div class="text-small mb-1"><a href="#"
                                                                    class="text-decoration-none text-muted"><small>Bakery
                                                &
                                                Biscuits</small></a></div>
                                    <h2 class="fs-6"><a href="#" class="text-inherit text-decoration-none">NutriChoice
                                            Digestive </a>
                                    </h2>
                                    <div class="text-warning">
                                        <!-- rating -->
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
                            <!-- card -->
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
                                    <div class="text-small mb-1"><a href="#"
                                                                    class="text-decoration-none text-muted"><small>Bakery
                                                &
                                                Biscuits</small></a></div>
                                    <h2 class="fs-6"><a href="#" class="text-inherit text-decoration-none">Cadbury 5
                                            Star
                                            Chocolate</a>
                                    </h2>
                                    <div class="text-warning">
                                        <!-- rating -->
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
                            <!-- card -->
                            <div class="card card-product">
                                <div class="card-body">
                                    <!-- badge -->
                                    <div class="text-center position-relative">
                                        <div class=" position-absolute top-0">
                                            <span class="badge bg-danger">hot</span>
                                        </div>

                                        <a href="#">
                                            <!-- img --><img src="assets/images/products/product-img-4.jpg"
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
                                    <div class="text-small mb-1"><a href="#"
                                                                    class="text-decoration-none text-muted"><small>Snack
                                                &
                                                Munchies</small></a></div>
                                    <h2 class="fs-6"><a href="#" class="text-inherit text-decoration-none">Onion Flavour
                                            Potato</a></h2>
                                    <div class="text-warning">
                                        <!-- rating -->
                                        <small> <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-half"></i>
                                            <i class="bi bi-star"></i></small> <span
                                            class="text-muted small">3.5 (456)</span>
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
                            <!-- card -->
                            <div class="card card-product">
                                <div class="card-body">
                                    <!-- badge -->
                                    <div class="text-center position-relative"><a href="#"><img
                                                src="assets/images/products/product-img-5.jpg"
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
                                    <div class="text-small mb-1"><a href="#"
                                                                    class="text-decoration-none text-muted"><small>Instant
                                                Food</small></a></div>
                                    <h2 class="fs-6"><a href="#" class="text-inherit text-decoration-none">Salted
                                            Instant
                                            Popcorn </a>
                                    </h2>
                                    <div class="text-warning">
                                        <!-- rating -->
                                        <small> <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-half"></i></small> <span
                                            class="text-muted small">4.5 (39)</span>
                                    </div>
                                    <div class="d-flex justify-content-between mt-4">
                                        <div><span class="text-dark">$13</span> <span
                                                class="text-decoration-line-through text-muted">$18</span>
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
                            <!-- card -->
                            <div class="card card-product">
                                <div class="card-body">

                                    <!-- badge -->
                                    <div class="text-center position-relative ">
                                        <div class=" position-absolute top-0">
                                            <span class="badge bg-danger">Sale</span>
                                        </div>
                                        <a href="#">
                                            <!-- img --><img src="assets/images/products/product-img-6.jpg"
                                                             alt="Grocery Ecommerce Template"
                                                             class="mb-3 img-fluid"></a>
                                        <!-- action btn -->
                                        <div class="card-product-action">
                                            <a href="#" class="btn-action" data-bs-toggle="modal"
                                               data-bs-target="#quickViewModal"><i
                                                    class="bi bi-eye" data-bs-toggle="tooltip" data-bs-html="true"
                                                    title="Quick View"></i></a>
                                            <a href="wish_list.html" class="btn-action" data-bs-toggle="tooltip"
                                               data-bs-html="true"
                                               title="Wishlist"><i class="bi bi-heart"></i></a>
                                            <a href="#" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true"
                                               title="Compare"><i
                                                    class="bi bi-arrow-left-right"></i></a>
                                        </div>
                                    </div>
                                    <!-- heading -->
                                    <div class="text-small mb-1"><a href="#"
                                                                    class="text-decoration-none text-muted"><small>Dairy,
                                                Bread
                                                &
                                                Eggs</small></a></div>
                                    <h2 class="fs-6"><a href="#" class="text-inherit text-decoration-none">Blueberry
                                            Greek
                                            Yogurt</a>
                                    </h2>
                                    <div>
                                        <!-- rating -->
                                        <small class="text-warning"> <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-half"></i></small> <span
                                            class="text-muted small">4.5 (189)</span>
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
                            <!-- card -->
                            <div class="card card-product">
                                <div class="card-body">
                                    <!-- badge -->
                                    <div class="text-center position-relative"><a href="#"><img
                                                src="assets/images/products/product-img-7.jpg"
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
                                    <div class="text-small mb-1"><a href="#"
                                                                    class="text-decoration-none text-muted"><small>Dairy,
                                                Bread
                                                &
                                                Eggs</small></a></div>
                                    <h2 class="fs-6"><a href="#" class="text-inherit text-decoration-none">Britannia
                                            Cheese
                                            Slices</a>
                                    </h2>
                                    <div class="text-warning">
                                        <!-- rating -->
                                        <small> <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i></small> <span
                                            class="text-muted small">5 (345)</span>
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
                            <!-- card -->
                            <div class="card card-product">
                                <div class="card-body">
                                    <!-- badge -->
                                    <div class="text-center position-relative"><a href="#"><img
                                                src="assets/images/products/product-img-8.jpg"
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
                                    <div class="text-small mb-1"><a href="#"
                                                                    class="text-decoration-none text-muted"><small>Instant
                                                Food</small></a></div>
                                    <h2 class="fs-6"><a href="#" class="text-inherit text-decoration-none">Kellogg's
                                            Original Cereals</a>
                                    </h2>
                                    <div class="text-warning">
                                        <!-- rating -->
                                        <small> <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-half"></i></small> <span
                                            class="text-muted small">4 (90)</span>
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
                            <!-- card -->
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
                                    <div class="text-small mb-1"><a href="#"
                                                                    class="text-decoration-none text-muted"><small>Snack
                                                &
                                                Munchies</small></a></div>
                                    <h2 class="fs-6"><a href="#" class="text-inherit text-decoration-none">Slurrp Millet
                                            Chocolate </a>
                                    </h2>
                                    <div class="text-warning">
                                        <!-- rating -->
                                        <small> <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-half"></i></small> <span
                                            class="text-muted small">4.5 (67)</span>
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
                            <!-- card -->
                            <div class="card card-product">
                                <div class="card-body">
                                    <!-- badge -->
                                    <div class="text-center position-relative"><a href="#"><img
                                                src="assets/images/products/product-img-10.jpg"
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
                                    <div class="text-small mb-1"><a href="#"
                                                                    class="text-decoration-none text-muted"><small>Dairy,
                                                Bread
                                                &
                                                Eggs</small></a></div>
                                    <h2 class="fs-6"><a href="#" class="text-inherit text-decoration-none">Amul Butter -
                                            500 g</a></h2>
                                    <div class="text-warning">
                                        <!-- rating -->
                                        <small> <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-half"></i>
                                            <i class="bi bi-star"></i></small> <span
                                            class="text-muted small">3.5 (89)</span>
                                    </div>
                                    <div class="d-flex justify-content-between mt-4">
                                        <div><span class="text-dark">$13</span> <span
                                                class="text-decoration-line-through text-muted">$18</span>
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
                    <div class="row mt-8">
                        <div class="col">
                            <!-- nav -->
                            <nav>
                                <ul class="pagination">
                                    <li class="page-item disabled">
                                        <a class="page-link  mx-1 rounded-3 " href="#" aria-label="Previous">
                                            <i class="feather-icon icon-chevron-left"></i>
                                        </a>
                                    </li>
                                    <li class="page-item "><a class="page-link  mx-1 rounded-3 active" href="#">1</a>
                                    </li>
                                    <li class="page-item"><a class="page-link mx-1 rounded-3 text-body" href="#">2</a>
                                    </li>

                                    <li class="page-item"><a class="page-link mx-1 rounded-3 text-body" href="#">...</a>
                                    </li>
                                    <li class="page-item"><a class="page-link mx-1 rounded-3 text-body" href="#">12</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link mx-1 rounded-3 text-body" href="#" aria-label="Next">
                                            <i class="feather-icon icon-chevron-right"></i>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
