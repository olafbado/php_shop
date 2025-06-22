@extends('layouts.client')

@section('title', 'Products')

@section('content')
<h1 class="mb-4">Products</h1>
<div class="row">
@foreach($products as $product)
    <div class="col-md-4 mb-3">
        <div class="card h-100">
            <div class="card-body">
                <h5 class="card-title">{{ $product->name }}</h5>
                <p class="card-text">{{ $product->description }}</p>
                <p><strong>{{ $product->price }}</strong></p>
                <a href="{{ route('products.show', $product) }}" class="btn btn-primary">View</a>
            </div>
        </div>
    </div>
@endforeach
</div>
@endsection
