<!DOCTYPE html>
<html>
<head>
    <title>@yield('title', 'Shop')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/') }}">Shop</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarClient" aria-controls="navbarClient" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarClient">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" href="{{ route('products.index') }}">Products</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('orders.index') }}">Orders</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('addresses.index') }}">Addresses</a></li>
            </ul>
            <form method="POST" action="{{ url('/logout') }}" class="d-flex">
                @csrf
                <button type="submit" class="btn btn-link">Logout</button>
            </form>
        </div>
    </div>
</nav>
<div class="container">
    @yield('content')
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
