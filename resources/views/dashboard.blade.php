@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2 class="mb-4">Welcome, {{ Auth::user()->name }} 👋</h2>

        <div class="row">
            {{-- Total Products Card --}}
            <div class="col-md-4">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-header">Products</div>
                    <div class="card-body">
                        <h5 class="card-title">120</h5>
                        <p class="card-text">Total products in the store.</p>
                    </div>
                </div>
            </div>

            {{-- Orders Card --}}
            <div class="col-md-4">
                <div class="card text-white bg-success mb-3">
                    <div class="card-header">Orders</div>
                    <div class="card-body">
                        <h5 class="card-title">34</h5>
                        <p class="card-text">Orders placed by customers.</p>
                    </div>
                </div>
            </div>

            {{-- Users Card --}}
            <div class="col-md-4">
                <div class="card text-white bg-dark mb-3">
                    <div class="card-header">Users</div>
                    <div class="card-body">
                        <h5 class="card-title">15</h5>
                        <p class="card-text">Registered users on platform.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-4">
            <a href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
               class="btn btn-outline-danger">Logout</a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </div>
@endsection
