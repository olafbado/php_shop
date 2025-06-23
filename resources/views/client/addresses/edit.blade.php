@extends('layouts.client')

@section('title', 'Edit Address')

@section('content')
<h1 class="mb-4">Edit Address</h1>
@include('layouts.errors')
<form method="POST" action="{{ route('addresses.update', $address) }}">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label class="form-label">Line 1</label>
        <input type="text" name="line1" value="{{ old('line1', $address->line1) }}" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">City</label>
        <input type="text" name="city" value="{{ old('city', $address->city) }}" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Postcode</label>
        <input type="text" name="postcode" value="{{ old('postcode', $address->postcode) }}" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{ route('addresses.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
