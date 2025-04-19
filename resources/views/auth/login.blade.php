@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Login</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <label>Email</label>
                <input name="email" type="email" class="form-control " required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input name="password" type="password" class="form-control" required>
            </div>
            <button class="btn btn-primary mt-3">Login</button>
        </form>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

@endsection
