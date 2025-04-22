<div class="col-lg-3 col-md-4 mb-6 mb-md-0">
    <!-- Category -->
    <div class="py-4">
        <h5 class="mb-3">Categories</h5>
        <ul class="nav nav-category" id="categoryCollapseMenu">
            @foreach($categories as $cat)
                <li class="nav-item d-flex flex-wrap align-items-center justify-content-between border-bottom w-100 {{ $cat->inTree($category) ? '' : 'collapsed' }}">
                    <a href="#" class="{{ $category == $cat->id ? 'nav-link-active ' : ''}}nav-link category-link"
                       data-category="{{ $cat->id }}">{{ $cat->name }}</a>
                    @if($cat->children)
                        <a class="btn btn-icon border-0"
                           data-bs-toggle="collapse"
                           data-bs-target="#category{{ $cat->id }}"
                           aria-expanded="false"
                           aria-controls="category{{ $cat->id }}">
                            <i class="bi bi-chevron-right"></i>
                        </a>
                    @endif
                    @if($cat->children)
                        <div id="category{{ $cat->id }}"
                             class="w-100 accordion-collapse collapse {{ $cat->inTree($category) ? 'show' : '' }}"
                             data-bs-parent="#categoryCollapseMenu">
                            <div>
                                <ul class="nav flex-column ms-3">
                                    @foreach($cat->children as $subcat)
                                        <li class="nav-item">
                                            <a href="#"
                                               class="{{ $category == $subcat->id ? 'nav-link-active ' : ''}}nav-link category-link"
                                               data-category="{{ $subcat->id }}">{{ $subcat->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif
                </li>
            @endforeach
        </ul>
    </div>
    {{--<div class="py-4">
        <h5 class="mb-3">Stores</h5>
        <div class="my-4">
            <input type="search" class="form-control" placeholder="Search by store">
        </div>
        <div class="form-check mb-2">
            <input class="form-check-input" type="checkbox" value="" id="eGrocery" checked>
            <label class="form-check-label" for="eGrocery">
                E-Grocery
            </label>
        </div>
    </div>--}}
    <!-- Price -->
    <div class="py-4">
        <h5 class="mb-3">Price</h5>
        <div>
            <div id="price-limits"
                 data-min="{{ $price_limits['min'] }}"
                 data-max="{{ $price_limits['max'] }}"
                 data-start="{{ $price_min ?? $price_limits['min'] }}"
                 data-end="{{ $price_max ?? $price_limits['max'] }}"
                 class="mb-3"></div>
            <small class="text-muted">Price:</small> <span id="price-limits-value" class="small"></span>
        </div>
    </div>
    <!-- rating -->
    <div class="py-4">
        <h5 class="mb-3">Rating</h5>
        <div>
            @foreach(range(5,1, -1) as $stars)
                <div class="form-check mb-2">
                    <input form="filter-form" class="filter-input form-check-input" type="radio" name="min_rating"
                           {{ ($stars === (int)$min_rating) ? 'checked' : '' }} value="{{ $stars }}"
                           id="rating-{{ $stars }}">
                    <label class="form-check-label" for="rating-{{ $stars }}">
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi {{ ($stars - 1) >= 1 ? 'bi-star-fill' : 'bi-star' }} text-warning "></i>
                        <i class="bi {{ ($stars - 2) >= 1 ? 'bi-star-fill' : 'bi-star' }} text-warning "></i>
                        <i class="bi {{ ($stars - 3) >= 1 ? 'bi-star-fill' : 'bi-star' }} text-warning "></i>
                        <i class="bi {{ ($stars - 4) >= 1 ? 'bi-star-fill' : 'bi-star' }} text-warning "></i>
                    </label>
                </div>
            @endforeach
        </div>
    </div>
</div>
