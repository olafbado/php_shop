@extends('layouts.admin')

@section('title', 'Edit Category')

@section('content')
<h1 class="mb-4">Edit Category</h1>
@include('layouts.errors')
<form method="POST" action="{{ route('admin.categories.update', $category) }}">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label class="form-label">Name</label>
        <input type="text" name="name" value="{{ old('name', $category->name) }}" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
