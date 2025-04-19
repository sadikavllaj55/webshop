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
    <div class="mb-4">
        <h5 class="mb-2">Filter by Price</h5>
        <div id="price-slider"></div>
        <div class="d-flex justify-content-between mt-2">
            <span id="price-min">€0</span>
            <span id="price-max">€1000</span>
        </div>
    </div>

    <div class="row">
        @forelse ($products as $product)
            <div class="col-md-3 mb-4">
                <div class="card h-100">
                    <img src="{{ $product->main_image_url ?? 'https://via.placeholder.com/300x200' }}" class="card-img-top" alt="{{ $product->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">${{ number_format($product->price, 2) }}</p>
                    </div>
                </div>
            </div>
        @empty
            <p>No products found.</p>
        @endforelse
    </div>

    <div>
        {{ $products->links() }}
    </div>
</div>
