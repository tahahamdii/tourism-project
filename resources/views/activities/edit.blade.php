@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Activity</h1>
        <form action="{{ route('activities.update', $activity->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" value="{{ $activity->name }}" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="type">Type:</label>
                <input type="text" name="type" id="type" value="{{ $activity->type }}" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="location">Location:</label>
                <input type="text" name="location" id="location" value="{{ $activity->location }}" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="date">Date:</label>
                <input type="date" name="date" id="date" value="{{ $activity->date }}" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea name="description" id="description" class="form-control">{{ $activity->description }}</textarea>
            </div>
            <button type="submit" class="btn btn-success">Update Activity</button>
        </form>
    </div>
@endsection
