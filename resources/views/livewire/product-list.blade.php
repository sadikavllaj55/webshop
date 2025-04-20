<div>
    <div class="mb-4 d-flex gap-3">
        <div class="col-xxl-6 col-lg-5 d-none d-lg-block">
            <form action="#" class="search-header">
                <div class="input-group">
                    <input type="text" class="form-control border-end-0" placeholder="Search for products.."
                           aria-label="Search for products.." aria-describedby="basic-addon2">
                    <span class="input-group-text bg-transparent" id="basic-addon2">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                     class="feather feather-search">
                  <circle cx="11" cy="11" r="8"></circle>
                  <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                </svg></span>
                </div>
            </form>
        </div>
            <div class="d-none d-lg-block">
                <ul class="navbar-nav ">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                           aria-expanded="false">
                            Pages
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="blog.html">Blog</a></li>
                            <li><a class="dropdown-item" href="single_blog.html">Blog Single</a></li>
                            <!-- <li><a class="dropdown-item" href="./pages/blog-category.html">Blog Category</a></li> -->
                            <li><a class="dropdown-item" href="about_us.html">About Us</a></li>
                            <!-- <li><a class="dropdown-item" href="./pages/404error.html">404 Error</a></li> -->
                            <li><a class="dropdown-item" href="contact_us.html">Contact Us</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
    </div>
    <div class="row g-4 row-cols-lg-5 row-cols-2 row-cols-md-3">
        @foreach($products as $product)
            <div class="col">
                <div class="card card-product">
                    <div class="card-body">
                        <div class="text-center position-relative ">
                            <a href="#"> <img src="assets/images/products/product-img-1.jpg"
                                              alt="Grocery Ecommerce Template"
                                              class="mb-3 img-fluid"></a>
                        </div>
                        <div class="text-small mb-1"><a href="#" class="text-decoration-none text-muted"><small>{{ $product->category->name }}</small></a></div>
                        <h2 class="fs-6"><a href="#" class="text-inherit text-decoration-none">{{ $product->name }}</a></h2>
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <div><span class="text-dark">{{ $product->price }} $</span>
                            </div>
                            <div><a href="#" class="btn btn-primary btn-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                                         fill="none"
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
                @endforeach
    </div>

    <div>
        {{ $products->links() }}
    </div>
</div>
