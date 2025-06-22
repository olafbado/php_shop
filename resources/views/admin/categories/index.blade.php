@extends('layouts.admin')

@section('title', 'Categories')

@section('content')
<h1 class="mb-4">Categories</h1>
<a href="{{ route('admin.categories.create') }}" class="btn btn-primary mb-3">Add Category</a>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th class="text-center">Actions</th>
        </tr>
    </thead>
    <tbody>
    @foreach($categories as $category)
        <tr>
            <td>{{ $category->id }}</td>
            <td><a href="{{ route('admin.categories.show', $category) }}">{{ $category->name }}</a></td>
            <td class="text-center">
                <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-sm btn-secondary">Edit</a>
                <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" class="d-inline">
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
