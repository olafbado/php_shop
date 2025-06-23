@extends('layouts.admin')

@section('title', 'Edit Product')

@section('content')
<h1 class="mb-4">Edit Product</h1>
@include('layouts.errors')
<form method="POST" action="{{ route('admin.products.update', $product) }}">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label class="form-label">Name</label>
        <input type="text" name="name" value="{{ old('name', $product->name) }}" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Description</label>
        <textarea name="description" class="form-control">{{ old('description', $product->description) }}</textarea>
    </div>
    <div class="mb-3">
        <label class="form-label">Price</label>
        <input type="number" step="0.01" name="price" value="{{ old('price', $product->price) }}" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Stock</label>
        <input type="number" name="stock" value="{{ old('stock', $product->stock) }}" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
