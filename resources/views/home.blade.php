@extends('layouts.front')

@section('title') Home @endsection

@section('content')
    <section class="my-8">
        <div class="container">
            <div class="row gx-10">
                <p>Home</p>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/page/app.js') }}"></script>
@endsection
