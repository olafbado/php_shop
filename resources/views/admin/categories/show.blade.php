@extends('layouts.admin')

@section('title', 'Category Details')

@section('content')
<h1 class="mb-4">{{ $category->name }}</h1>
<ul class="list-group mb-3">
    <li class="list-group-item"><strong>ID:</strong> {{ $category->id }}</li>
</ul>
<a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-secondary">Edit</a>
<a href="{{ route('admin.categories.index') }}" class="btn btn-link">Back</a>
@endsection
