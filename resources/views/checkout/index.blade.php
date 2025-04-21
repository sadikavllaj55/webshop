
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Codescandy" name="author">
    <title>Order Single Dashboard eCommerce HTML Template - FreshCart</title>
    <!-- Favicon icon-->
    <link rel="shortcut icon" type="image/x-icon" href="../assets/images/favicon/favicon.ico">


    <!-- Libs CSS -->
    <link href="../assets/libs/bootstrap-icons/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="../assets/libs/feather-webfont/dist/feather-icons.css" rel="stylesheet">
    <link href="../assets/libs/simplebar/dist/simplebar.min.css" rel="stylesheet">


    <!-- Theme CSS -->
    <link rel="stylesheet" href="../assets/css/theme.min.css">
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-M8S4MT3EYG"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() {
            dataLayer.push(arguments);
        }
        gtag("js", new Date());

        gtag("config", "G-M8S4MT3EYG");
    </script>
    <script type="text/javascript">
        (function (c, l, a, r, i, t, y) {
            c[a] =
                c[a] ||
                function () {
                    (c[a].q = c[a].q || []).push(arguments);
                };
            t = l.createElement(r);
            t.async = 1;
            t.src = "https://www.clarity.ms/tag/" + i;
            y = l.getElementsByTagName(r)[0];
            y.parentNode.insertBefore(t, y);
        })(window, document, "clarity", "script", "kuc8w5o9nt");
    </script>

</head>

<body>
<!-- main -->
<!-- navbar -->


<!-- main wrapper -->
<div class="main-wrapper">
    <!-- navbar vertical -->
    <!-- navbar -->
    <nav class="navbar-vertical-nav offcanvas offcanvas-start navbar-offcanvac" tabindex="-1" id="offcanvasExample">
        <div class="navbar-vertical">
            <div class="px-4 py-5 d-flex justify-content-between align-items-center">
                <a href="../index.html" class="navbar-brand">
                    <img src="../assets/images/logo/freshcart-logo.svg" alt="" />
                </a>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
        </div>
    </nav>

    <main class="main-content-wrapper">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row mb-8">
                <div class="col-md-12">
                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-4">
                        <div>
                            <!-- page header -->
                            <h2>Order Single</h2>
                            <!-- breacrumb -->
                        </div>
                        <!-- button -->
                        <div>
                            <a href="{{ route('products.index') }}" class="btn btn-primary">Back to products</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-xl-12 col-12 mb-5">
                    <!-- card -->
                    <div class="card h-100 card-lg">
                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <!-- Table -->
                                    <table class="table mb-0 text-nowrap table-centered">
                                        <!-- Table Head -->
                                        <thead class="bg-light">
                                        <tr>
                                            <th>Products</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Total</th>
                                        </tr>
                                        </thead>
                                        <!-- tbody -->
                                        <tbody>
                                        @foreach($items as $item)
                                        <tr>
                                            <td>
                                                <a href="#" class="text-inherit">
                                                    <div class="d-flex align-items-center">
                                                        <div class="ms-lg-4 mt-2 mt-lg-0">
                                                            <h5 class="mb-0 h6">{{ $item->product->name }}</h5>
                                                        </div>
                                                    </div>
                                                </a>
                                            </td>
                                            <td><span class="text-body">{{ $item->price }}</span></td>
                                            <td>{{ $item->quantity }}</td>
                                            <td>{{ $item->itemsprice }}</td>
                                        </tr>
                                        @endforeach
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td colspan="1" class="fw-semibold text-dark">
                                                <!-- text -->
                                                Total
                                            </td>
                                            <td class="fw-semibold text-dark">
                                                <!-- text -->
                                                ${{ $totalPrice }}
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <form action="{{ route('order.store') }}" method="POST">
                            @csrf
                            @foreach ($items as $item)
                                <input type="hidden" name="items[{{ $loop->index }}][product_id]" value="{{ $item->product->id }}">
                                <input type="hidden" name="items[{{ $loop->index }}][price]" value="{{ $item->price }}">
                                <input type="hidden" name="items[{{ $loop->index }}][quantity]" value="{{ $item->quantity }}">
                            @endforeach
                            <div class="card-body p-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-primary">Continue payment</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

<!-- Libs JS -->
<!-- <script src="../assets/libs/jquery/dist/jquery.min.js"></script> -->
<script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="../assets/libs/simplebar/dist/simplebar.min.js"></script>

<!-- Theme JS -->
<script src="../assets/js/theme.min.js"></script>

</body>
</html>
