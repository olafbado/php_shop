@extends('layouts.admin')

@section('title', 'Add Category')

@section('content')
<h1 class="mb-4">Add Category</h1>
@include('layouts.errors')
<form method="POST" action="{{ route('admin.categories.store') }}">
    @csrf
    <div class="mb-3">
        <label class="form-label">Name</label>
        <input type="text" name="name" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
    <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
