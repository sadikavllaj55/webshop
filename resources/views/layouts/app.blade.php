<!DOCTYPE html>
<html>
<head>
    @livewireStyles
    <title>My E-commerce</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
@if(Auth::check())
    <nav class="navbar navbar-light bg-light">
        <span class="navbar-brand">Welcome, {{ Auth::user()->name }}</span>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="btn btn-outline-danger">Logout</button>
        </form>
    </nav>
@endif

@yield('content')
@livewireScripts
</body>
</html>
