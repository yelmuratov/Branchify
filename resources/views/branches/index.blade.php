@extends('layout')

@section('content')
<h1 class="mb-4">Branches</h1>

<a href="{{ route('branches.create') }}" class="btn btn-primary mb-3">Add New Branch</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Base</th>
            <th>Parent Branch</th>
            <th>Price</th>
            <th>Own Price</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($branches as $branch)
        <tr>
            <td>{{ $branch->id }}</td>
            <td>{{ $branch->name }}</td>
            <td>{{ $branch->base->name ?? 'N/A' }}</td>
            <td>{{ $branch->parent_id->name ?? 'N/A' }}</td>
            <td>{{ $branch->price }}</td>
            <td>{{ $branch->own_price }}</td>
            <td>
                <a href="{{ route('branches.edit', $branch) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('branches.destroy', $branch) }}" method="POST" class="d-inline">
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
