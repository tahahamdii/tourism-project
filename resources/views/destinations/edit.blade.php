@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Destination</h1>
        <form action="{{ route('destinations.update', $destination->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" value="{{ $destination->name }}" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="location">Location:</label>
                <input type="text" name="location" id="location" value="{{ $destination->location }}" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea name="description" id="description" class="form-control">{{ $destination->description }}</textarea>
            </div>
            <button type="submit" class="btn btn-success">Update Destination</button>
        </form>
    </div>
@endsection
