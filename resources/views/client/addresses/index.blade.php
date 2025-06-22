@extends('layouts.client')

@section('title', 'My Addresses')

@section('content')
<h1 class="mb-4">My Addresses</h1>
<a href="{{ route('addresses.create') }}" class="btn btn-primary mb-3">Add Address</a>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Line 1</th>
            <th>City</th>
            <th>Postcode</th>
            <th class="text-center">Actions</th>
        </tr>
    </thead>
    <tbody>
    @foreach($addresses as $address)
        <tr>
            <td>{{ $address->id }}</td>
            <td>{{ $address->line1 }}</td>
            <td>{{ $address->city }}</td>
            <td>{{ $address->postcode }}</td>
            <td class="text-center">
                <a href="{{ route('addresses.edit', $address) }}" class="btn btn-sm btn-secondary">Edit</a>
                <form action="{{ route('addresses.destroy', $address) }}" method="POST" class="d-inline">
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
