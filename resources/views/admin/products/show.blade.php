@extends('layouts.admin')

@section('title', 'Product Details')

@section('content')
<h1 class="mb-4">{{ $product->name }}</h1>
<ul class="list-group mb-3">
    <li class="list-group-item"><strong>ID:</strong> {{ $product->id }}</li>
    <li class="list-group-item"><strong>Price:</strong> {{ $product->price }}</li>
    <li class="list-group-item"><strong>Stock:</strong> {{ $product->stock }}</li>
    <li class="list-group-item"><strong>Description:</strong> {{ $product->description }}</li>
</ul>
<a href="{{ route('admin.products.edit', $product) }}" class="btn btn-secondary">Edit</a>
<a href="{{ route('admin.products.index') }}" class="btn btn-link">Back</a>
@endsection
