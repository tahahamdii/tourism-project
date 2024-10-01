@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Add Transport</h1>
        <form action="{{ route('transports.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="type">Type:</label>
                <input type="text" name="type" id="type" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="company">Company:</label>
                <input type="text" name="company" id="company" class="form-control">
            </div>
            <div class="form-group">
                <label for="location">Location:</label>
                <input type="text" name="location" id="location" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="date">Date:</label>
                <input type="date" name="date" id="date" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea name="description" id="description" class="form-control"></textarea>
            </div>
            <button type="submit" class="btn btn-success">Add Transport</button>
        </form>
    </div>
@endsection
