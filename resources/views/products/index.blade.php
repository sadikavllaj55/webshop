@extends('layouts.front')

@section('content')
    <section class=" mt-8 mb-lg-14 mb-8">
        <div class="container">
            <div class="row gx-10">
                <!-- Filters -->
                @include('products.filters')
                <!-- Products -->
                <div class="col-lg-9 col-md-8">
                    <div class="card mb-4 bg-light border-0">
                        <div class=" card-body p-9">
                            <h1 class="mb-0">Products</h1>
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
                                <!-- select option -->
                                <select class="form-select">
                                    <option value="10">10</option>
                                    <option value="20">20</option>
                                    <option value="50" selected>50</option>
                                </select>
                            </div>
                            <div>
                                <!-- select option -->
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>Sort by: Featured</option>
                                    <option value="Low to High">Price: Low to High</option>
                                    <option value="High to Low"> Price: High to Low</option>
                                    <option value="Release Date"> Release Date</option>
                                    <option value="Avg. Rating"> Avg. Rating</option>
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
                            <!-- nav -->
                            <nav>{{ $products->links() }}</nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script type="module" src="{{ asset('assets/js/page/app.js') }}"></script>
@endsection
