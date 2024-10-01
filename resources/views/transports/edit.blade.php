@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Transport</h1>
        <form action="{{ route('transports.update', $transport->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" value="{{ $transport->name }}" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="type">Type:</label>
                <input type="text" name="type" id="type" value="{{ $transport->type }}" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="company">Company:</label>
                <input type="text" name="company" id="company" value="{{ $transport->company }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="location">Location:</label>
                <input type="text" name="location" id="location" value="{{ $transport->location }}" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="date">Date:</label>
                <input type="date" name="date" id="date" value="{{ $transport->date }}" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea name="description" id="description" class="form-control">{{ $transport->description }}</textarea>
            </div>
            <button type="submit" class="btn btn-success">Update Transport</button>
        </form>
    </div>
@endsection
