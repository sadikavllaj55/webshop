<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title') - Ecommerce App</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon icon-->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/favicon.ico') }}">
    <!-- Libs CSS -->
    <link href="{{ asset('assets/css/bootstrap-icons.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/css/feather-icons.css') }}" rel="stylesheet"/>

    <link href="{{ asset('assets/libs/slick-carousel/slick.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/libs/slick-carousel/slick-theme.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/css/simplebar.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/css/nouislider.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/css/tiny-slider.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/css/dropzone.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/css/prism-okaidia.min.css') }}" rel="stylesheet"/>

    <link href="{{ asset('assets/css/theme.min.css') }}" rel="stylesheet"/>
</head>

<body>

@include('layouts.header')

@include('layouts.cart')

{{--@include('layouts.modals')--}}

@yield('content')

@include('layouts.footer')


<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.countdown.min.js') }}"></script>
<script src="{{ asset('assets/libs/slick-carousel/slick.min.js') }}"></script>
<script src="{{ asset('assets/js/simplebar.min.js') }}"></script>
<script src="{{ asset('assets/js/nouislider.min.js') }}"></script>
<script src="{{ asset('assets/js/wNumb.min.js') }}"></script>
<script src="{{ asset('assets/js/index.js') }}"></script>
<script src="{{ asset('assets/js/prism.js') }}"></script>
<script src="{{ asset('assets/js/prism-scss.min.js') }}"></script>
<script src="{{ asset('assets/js/prism-toolbar.min.js') }}"></script>
<script src="{{ asset('assets/js/prism-copy-to-clipboard.min.js') }}"></script>
<script src="{{ asset('assets/js/tiny-slider.js') }}"></script>
<script src="{{ asset('assets/js/dropzone.min.js') }}"></script>
<script src="{{ asset('assets/js/flatpickr.min.js') }}"></script>


<!-- Theme JS -->
<script src="{{ asset('assets/js/theme.min.js') }}"></script>


</body>

</html>
