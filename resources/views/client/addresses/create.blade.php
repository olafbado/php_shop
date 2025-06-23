@extends('layouts.client')

@section('title', 'Add Address')

@section('content')
<h1 class="mb-4">Add Address</h1>
@include('layouts.errors')
<form method="POST" action="{{ route('addresses.store') }}">
    @csrf
    <div class="mb-3">
        <label class="form-label">Line 1</label>
        <input type="text" name="line1" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">City</label>
        <input type="text" name="city" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Postcode</label>
        <input type="text" name="postcode" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
    <a href="{{ route('addresses.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
