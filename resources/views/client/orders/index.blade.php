@extends('layouts.client')

@section('title', 'My Orders')

@section('content')
<h1 class="mb-4">My Orders</h1>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Status</th>
            <th class="text-center">Actions</th>
        </tr>
    </thead>
    <tbody>
    @foreach($orders as $order)
        <tr>
            <td>{{ $order->id }}</td>
            <td>{{ $order->status }}</td>
            <td class="text-center">
                <a href="{{ route('orders.show', $order) }}" class="btn btn-sm btn-primary">View</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<form method="POST" action="{{ route('orders.store') }}" class="mt-3">
    @csrf
    <button type="submit" class="btn btn-success">Place New Order</button>
</form>
@endsection
