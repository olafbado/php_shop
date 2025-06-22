@extends('layouts.admin')

@section('title', 'Order Details')

@section('content')
<h1 class="mb-4">Order #{{ $order->id }}</h1>
<ul class="list-group mb-3">
    <li class="list-group-item"><strong>User:</strong> {{ $order->user->name }}</li>
    <li class="list-group-item"><strong>Status:</strong> {{ $order->status }}</li>
</ul>
<h2>Products</h2>
<table class="table table-bordered mb-3">
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
<form method="POST" action="{{ route('admin.orders.update', $order) }}" class="mb-3">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label class="form-label">Status</label>
        <input type="text" name="status" value="{{ old('status', $order->status) }}" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
<a href="{{ route('admin.orders.index') }}" class="btn btn-link">Back to orders</a>
@endsection
