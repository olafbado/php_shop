@extends('layouts.guest')

@section('title', 'Register')

@section('content')
<h1 class="mb-4">Register</h1>
@include('layouts.errors')
<form method="POST" action="{{ url('/register') }}">
    @csrf
    <div class="mb-3">
        <label class="form-label">Name</label>
        <input type="text" name="name" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" name="password" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Confirm Password</label>
        <input type="password" name="password_confirmation" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Register</button>
    <a href="{{ url('/login') }}" class="btn btn-link">Login</a>
</form>
@endsection