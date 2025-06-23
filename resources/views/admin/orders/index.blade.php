@extends('layouts.admin')

@section('title', 'Orders')

@section('content')
<h1 class="mb-4">Orders</h1>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>User</th>
            <th>Status</th>
            <th class="text-center">Actions</th>
        </tr>
    </thead>
    <tbody>
    @foreach($orders as $order)
        <tr>
            <td>{{ $order->id }}</td>
            <td>{{ $order->user->name }}</td>
            <td>{{ $order->status }}</td>
            <td class="text-center">
                <a href="{{ route('admin.orders.show', $order) }}" class="btn btn-sm btn-primary">View</a>
                <form action="{{ route('admin.orders.destroy', $order) }}" method="POST" class="d-inline">
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
