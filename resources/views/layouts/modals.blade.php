<!-- Login Modal -->
<div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content p-4">
            <div class="modal-header border-0">
                <h5 class="modal-title fs-3 fw-bold" id="userModalLabel">Sign In</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="login-form-modal" method="post" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3">
                        <input name="email" type="email" class="form-control p-4" id="email" placeholder="Email address" required>
                    </div>
                    <div class="mb-3">
                        <input name="password" type="password" class="form-control p-4" id="password" placeholder="Password" required>
                    </div>
                    <div class="mb-3 form-check">
                        <input name="remember_me" class="form-check-input" type="checkbox" value="" id="remember_me">
                        <label class="form-check-label" for="remember_me">
                            Remember me
                        </label>
                    </div>
                    <div class="form-error-container"></div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary text-uppercase">Sign In</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer border-0 justify-content-center">
                Don't have an account? <a href="/register">Register</a>
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
<!-- Add Review Modal -->
<div class="modal fade" id="productReviewModal" tabindex="-1" aria-labelledby="productReviewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body p-6">
                <div class="d-flex justify-content-between align-items-start ">
                    <div>
                        <h5 class="mb-1" id="productReviewModalLabel">Write a review</h5>
                        <p class="mb-0 small">We welcome your feedback.</p>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div>
                    <div class="border-bottom py-4 mb-4">
                        <h5>Add a headline</h5>
                        <input type="text" class="form-control"
                               placeholder="What’s most important to know">
                    </div>
                    <div class="border-bottom py-4 mb-4">
                        <h5>Add a photo or video</h5>
                        <p>Shoppers find images and videos more helpful than text alone.</p>
                        <!-- form -->
                        <form action="#" class=" dropzone profile-dropzone">
                            <div class="fallback">
                                <input name="file" type="file" multiple/>
                            </div>
                        </form>

                    </div>
                    <div class=" py-4 mb-4">
                        <!-- heading -->
                        <h5>Add a written review</h5>
                        <textarea class="form-control" rows="3"
                                  placeholder="What did you like or dislike? What did you use this product for?"></textarea>

                    </div>
                    <!-- button -->
                    <div class="d-flex justify-content-end">
                        <a href="#" class="btn btn-primary">Submit Review</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
