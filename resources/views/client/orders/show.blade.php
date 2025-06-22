@extends('layouts.client')

@section('title', 'Order #' . $order->id)

@section('content')
<h1 class="mb-4">Order #{{ $order->id }}</h1>
<ul class="list-group mb-3">
    <li class="list-group-item"><strong>Status:</strong> {{ $order->status }}</li>
</ul>
<h3>Products</h3>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Name</th>
            <th>Quantity</th>
            <th>Price</th>
        </tr>
    </thead>
    <tbody>
    @foreach($order->products as $product)
        <tr>
            <td>{{ $product->name }}</td>
            <td>{{ $product->pivot->quantity }}</td>
            <td>{{ $product->pivot->price }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
<a href="{{ route('orders.index') }}" class="btn btn-link">Back</a>
@endsection
