@extends('layouts.admin')

@section('title', 'Reviews')

@section('content')
<h1 class="mb-4">Reviews</h1>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Product</th>
            <th>User</th>
            <th>Rating</th>
            <th>Comment</th>
            <th class="text-center">Actions</th>
        </tr>
    </thead>
    <tbody>
    @foreach($reviews as $review)
        <tr>
            <td>{{ $review->id }}</td>
            <td>{{ $review->product->name }}</td>
            <td>{{ $review->user->name }}</td>
            <td>{{ $review->rating }}</td>
            <td>{{ $review->comment }}</td>
            <td class="text-center">
                <form action="{{ route('admin.reviews.destroy', $review) }}" method="POST" class="d-inline">
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
