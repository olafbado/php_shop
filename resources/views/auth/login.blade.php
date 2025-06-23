@extends('layouts.guest')

@section('title', 'Login')

@section('content')
<h1 class="mb-4">Login</h1>
@include('layouts.errors')
<form method="POST" action="{{ url('/login') }}">
    @csrf
    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control" required autofocus>
    </div>
    <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" name="password" class="form-control" required>
    </div>
    <div class="mb-3 form-check">
        <input type="checkbox" name="remember" class="form-check-input" id="remember">
        <label class="form-check-label" for="remember">Remember me</label>
    </div>
    <button type="submit" class="btn btn-primary">Login</button>
    <a href="{{ url('/register') }}" class="btn btn-link">Register</a>
</form>
@endsection
