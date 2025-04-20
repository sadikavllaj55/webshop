@extends('layouts.front')

@section('title') Shop @endsection

@section('content')
<form name="filter-form" id="filter-form" method="get" action="{{ route('products.index') }}">
    @csrf
    <input type="hidden" name="cat_id" value="{{ $category }}">
    <section class=" mt-8 mb-lg-14 mb-8">
        <div class="container">
            <div class="row gx-10">
                <!-- Filters -->
                @include('products.filters')
                <!-- Products -->
                <div class="col-lg-9 col-md-8">
                    <div class="card mb-4 bg-light border-0">
                        <div class=" card-body p-9">
                            <h1 class="mb-0">{{ $selected_category?->name ?? 'Products' }}</h1>
                        </div>
                    </div>
                    <div class="d-md-flex justify-content-between align-items-center">
                        <div>
                            <p class="mb-3 mb-md-0"><span class="text-dark">{{ $products->total() }} </span> Products found </p>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="/products?view=list" class="me-3 {{ app('request')->input('view', 'grid') == 'list' ? 'active' : 'text-muted' }}"><i class="bi bi-list-ul"></i></a>
                            <a href="/products" class="me-3 {{ app('request')->input('view', 'grid') == 'grid' ? 'active' : 'text-muted' }}"><i class="bi bi-grid"></i></a>
                            <div class="me-2">
                                <select class="form-select" name="ps" form="filter-form">
                                    <option selected>Show: {{ $page_size }}</option>
                                    @foreach($ps_options as $ps)
                                        @if($ps == $page_size)
                                            @continue
                                        @endif
                                        <option value="{{ $ps }}">{{ $ps }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <select class="form-select" name="sort" form="filter-form">
                                    <option selected>Sort by: Release Date</option>
                                    <option value="price.asc">Price: Low to High</option>
                                    <option value="price.desc">Price: High to Low</option>
                                    <option value="rating">Avg. Rating</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="{{ $product_list_classes }}">
                        @foreach($products as $product)
                            @include('products.product-single-'.$view, $product)
                        @endforeach
                    </div>
                    <!-- Pagination -->
                    <div class="row mt-8">
                        <div class="col">
                            <nav>{{ $products->links() }}</nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</form>
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/page/app.js') }}"></script>
    <script></script>
@endsection
