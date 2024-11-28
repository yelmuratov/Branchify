@extends('layout')

@section('content')
<h1>{{ isset($branch) ? 'Edit Branch' : 'Add New Branch' }}</h1>

<form action="{{ isset($branch) ? route('branches.update', $branch) : route('branches.store') }}" method="POST">
    @csrf
    @if(isset($branch))
    @method('PUT')
    @endif

    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $branch->name ?? '') }}" required>
    </div>

    <div class="mb-3">
        <label for="base_id" class="form-label">Base</label>
        <select class="form-control" id="base_id" name="parent_id">
            <option value="">None</option>
            @foreach($bases as $base)
            <option value="{{ $base->id }}" {{ old('base_id', $branch->base_id ?? '') == $base->id ? 'selected' : '' }}>{{ $base->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="price" class="form-label">Price</label>
        <input type="number" class="form-control" id="price" name="price" value="{{ old('price', $branch->price ?? '') }}">
    </div>

    <button type="submit" class="btn btn-success">{{ isset($branch) ? 'Update' : 'Create' }}</button>
</form>
@endsection
