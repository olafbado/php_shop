@extends('layouts.admin')

@section('title', 'Products')

@section('content')
<h1 class="mb-4">Products</h1>
<a href="{{ route('admin.products.create') }}" class="btn btn-primary mb-3">Add Product</a>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Stock</th>
            <th class="text-center">Actions</th>
        </tr>
    </thead>
    <tbody>
    @foreach($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td><a href="{{ route('admin.products.show', $product) }}">{{ $product->name }}</a></td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->stock }}</td>
            <td class="text-center">
                <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-sm btn-secondary">Edit</a>
                <form action="{{ route('admin.products.destroy', $product) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection
