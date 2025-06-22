@extends('layouts.client')

@section('title', $product->name)

@section('content')
<h1 class="mb-4">{{ $product->name }}</h1>
<p>{{ $product->description }}</p>
<p><strong>{{ $product->price }}</strong></p>
<h3>Reviews</h3>
@foreach($product->reviews as $review)
    <div class="mb-2">
        <strong>{{ $review->user->name }}</strong> - {{ $review->rating }}/5
        <p>{{ $review->comment }}</p>
    </div>
@endforeach
@include('layouts.errors')
<form method="POST" action="{{ route('products.reviews.store', $product) }}" class="mb-3">
    @csrf
    <div class="mb-3">
        <label class="form-label">Rating</label>
        <input type="number" name="rating" class="form-control" min="1" max="5" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Comment</label>
        <textarea name="comment" class="form-control"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Add Review</button>
</form>
<a href="{{ route('products.index') }}" class="btn btn-link">Back</a>
@endsection
