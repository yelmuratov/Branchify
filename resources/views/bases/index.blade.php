@extends('layout')

@section('content')
<h1 class="mb-4">Bases</h1>

<a href="{{ route('bases.create') }}" class="btn btn-primary mb-3">Add New Base</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($bases as $base)
        <tr>
            <td>{{ $base->id }}</td>
            <td>{{ $base->name }}</td>
            <td>{{ $base->price }}</td>
            <td>
                <a href="{{ route('bases.edit', $base) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('bases.destroy', $base) }}" method="POST" class="d-inline">
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
