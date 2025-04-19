<!-- Login Modal -->
<div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content p-4">
            <div class="modal-header border-0">
                <h5 class="modal-title fs-3 fw-bold" id="userModalLabel">Sign Up</h5>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="fullName" class="form-label">Name</label>
                        <input type="text" class="form-control" id="fullName" placeholder="Enter Your Name" required="">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter Email address"
                               required="">
                    </div>

                    <div class="mb-5">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Enter Password"
                               required="">
                        <small class="form-text">By Signup, you agree to our <a href="#">Terms of Service</a> & <a
                                    href="#">Privacy Policy</a></small>
                    </div>

                    <button type="submit" class="btn btn-primary">Sign Up</button>
                </form>
            </div>
            <div class="modal-footer border-0 justify-content-center">

                Already have an account? <a href="index.html">Sign in</a>
            </div>
        </div>
    </div>
</div>
<!-- Location Modal -->
<div class="modal fade" id="locationModal" tabindex="-1" aria-labelledby="locationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-body p-6">
                <div class="d-flex justify-content-between align-items-start ">
                    <div>
                        <h5 class="mb-1" id="locationModalLabel">Choose your Delivery Location</h5>
                        <p class="mb-0 small">Enter your address and we will specify the offer you area. </p>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="my-5">
                    <input type="search" class="form-control" placeholder="Search your area">
                </div>
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <h6 class="mb-0">Select Location</h6>
                    <a href="#" class="btn btn-outline-gray-400 text-muted btn-sm">Clear All</a>


                </div>
                <div>
                    <div data-simplebar style="height:300px;">
                        <div class="list-group list-group-flush">

                            <a href="#"
                               class="list-group-item d-flex justify-content-between align-items-center px-2 py-3 list-group-item-action active">
                                <span>Alabama</span><span>Min:$20</span></a>
                            <a href="#"
                               class="list-group-item d-flex justify-content-between align-items-center px-2 py-3 list-group-item-action">
                                <span>Alaska</span><span>Min:$30</span></a>
                            <a href="#"
                               class="list-group-item d-flex justify-content-between align-items-center px-2 py-3 list-group-item-action">
                                <span>Arizona</span><span>Min:$50</span></a>
                            <a href="#"
                               class="list-group-item d-flex justify-content-between align-items-center px-2 py-3 list-group-item-action">
                                <span>California</span><span>Min:$29</span></a>
                            <a href="#"
                               class="list-group-item d-flex justify-content-between align-items-center px-2 py-3 list-group-item-action">
                                <span>Colorado</span><span>Min:$80</span></a>
                            <a href="#"
                               class="list-group-item d-flex justify-content-between align-items-center px-2 py-3 list-group-item-action">
                                <span>Florida</span><span>Min:$90</span></a>
                            <a href="#"
                               class="list-group-item d-flex justify-content-between align-items-center px-2 py-3 list-group-item-action">
                                <span>Arizona</span><span>Min:$50</span></a>
                            <a href="#"
                               class="list-group-item d-flex justify-content-between align-items-center px-2 py-3 list-group-item-action">
                                <span>California</span><span>Min:$29</span></a>
                            <a href="#"
                               class="list-group-item d-flex justify-content-between align-items-center px-2 py-3 list-group-item-action">
                                <span>Colorado</span><span>Min:$80</span></a>
                            <a href="#"
                               class="list-group-item d-flex justify-content-between align-items-center px-2 py-3 list-group-item-action">
                                <span>Florida</span><span>Min:$90</span></a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- Product Modal -->
<div class="modal fade" id="quickViewModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body p-8">
                <div class="d-flex justify-content-end">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <!-- img slide -->
                        <div class="product productModal" id="productModal">
                            <div class="zoom" onmousemove="zoom()"
                                 style="background-image: url(assets/images/products/product-single-img-1.jpg)">
                                <!-- img -->
                                <img src="assets/images/products/product-single-img-1.jpg" alt="">
                            </div>
                            <div>
                                <div class="zoom" onmousemove="zoom()"
                                     style="background-image: url(assets/images/products/product-single-img-2.jpg)">
                                    <!-- img -->
                                    <img src="assets/images/products/product-single-img-2.jpg" alt="">
                                </div>

                            </div>
                            <div>
                                <div class="zoom" onmousemove="zoom()"
                                     style="background-image: url(assets/images/products/product-single-img-3.jpg)">
                                    <!-- img -->
                                    <img src="assets/images/products/product-single-img-3.jpg" alt="">
                                </div>

                            </div>
                            <div>
                                <div class="zoom" onmousemove="zoom()"
                                     style="background-image: url(assets/images/products/product-single-img-4.jpg)">
                                    <!-- img -->
                                    <img src="assets/images/products/product-single-img-4.jpg" alt="">
                                </div>
                            </div>
                        </div>
                        <!-- product tools -->
                        <div class="product-tools">
                            <div class="thumbnails row g-3" id="productModalThumbnails">
                                <div class="col-3">
                                    <div class="thumbnails-img">
                                        <!-- img -->
                                        <img src="assets/images/products/product-single-img-1.jpg" alt="">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="thumbnails-img">
                                        <!-- img -->
                                        <img src="assets/images/products/product-single-img-2.jpg" alt="">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="thumbnails-img">
                                        <!-- img -->
                                        <img src="assets/images/products/product-single-img-3.jpg" alt="">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="thumbnails-img">
                                        <!-- img -->
                                        <img src="assets/images/products/product-single-img-4.jpg" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="ps-md-8">
                            <a href="#" class="mb-4 d-block">Bakery Biscuits</a>
                            <h2 class="mb-1 h1">Napolitanke Ljesnjak </h2>
                            <div class="mb-4"><small class="text-warning"> <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-half"></i></small><a href="#" class="ms-2">(30 reviews)</a>
                            </div>
                            <div class="fs-4"><span class="fw-bold text-dark">$32</span> <span
                                        class="text-decoration-line-through text-muted">$35</span><span><small
                                            class="fs-6 ms-2 text-danger">26% Off</small></span>
                            </div>
                            <hr class="my-6">
                            <div>
                                <button type="button" class="btn btn-outline-secondary">250g</button>
                                <button type="button" class="btn btn-outline-secondary">500g</button>
                                <button type="button" class="btn btn-outline-secondary">1kg</button>
                            </div>
                            <div class="mt-5 d-flex justify-content-start">
                                <div class="col-2">
                                    <div class="input-group  flex-nowrap justify-content-center ">
                                        <input type="button" value="-"
                                               class="button-minus form-control  text-center flex-xl-none w-xl-30 w-xxl-10 px-0  "
                                               data-field="quantity">
                                        <input type="number" step="1" max="10" value="1" name="quantity"
                                               class="quantity-field form-control text-center flex-xl-none w-xl-30 w-xxl-10 px-0 ">
                                        <input type="button" value="+"
                                               class="button-plus form-control  text-center flex-xl-none w-xl-30  w-xxl-10 px-0  "
                                               data-field="quantity">
                                    </div>
                                </div>
                                <div class="ms-2 col-4 d-grid">
                                    <button type="button" class="btn btn-primary"><i
                                                class="feather-icon icon-shopping-bag me-2"></i>Add to cart
                                    </button>
                                </div>
                                <div class="ms-2 col-4">
                                    <a class="btn btn-light" href="#" data-bs-toggle="tooltip" data-bs-html="true"
                                       title="Compare"><i class="bi bi-arrow-left-right"></i></a>
                                    <a class="btn btn-light" href="wish_list.html" data-bs-toggle="tooltip"
                                       data-bs-html="true" title="Wishlist"><i class="feather-icon icon-heart"></i></a>
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
                                        <td><small>01-day shipping.<span class="text-muted">( Free pickup today)</span></small>
                                        </td>

                                    </tr>


                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
