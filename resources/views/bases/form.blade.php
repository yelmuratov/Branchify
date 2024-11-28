@extends('layout')

@section('content')
<h1>{{ isset($base) ? 'Edit Base' : 'Add New Base' }}</h1>

<form action="{{ isset($base) ? route('bases.update', $base) : route('bases.store') }}" method="POST">
    @csrf
    @if(isset($base))
    @method('PUT')
    @endif

    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $base->name ?? '') }}" required>
    </div>

    <div class="mb-3">
        <label for="price" class="form-label">Price</label>
        <input type="number" class="form-control" id="price" name="price" value="{{ old('price', $base->price ?? '') }}" required>
    </div>

    <button type="submit" class="btn btn-success">{{ isset($base) ? 'Update' : 'Create' }}</button>
</form>
@endsection
