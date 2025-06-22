@extends('layouts.client')

@section('title', 'Dashboard')

@section('content')
<h1 class="mb-4">Dashboard</h1>
<p>Welcome, {{ $user->name }}!</p>
@endsection
