@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Destinations</h1>
        <a href="{{ route('destinations.create') }}" class="btn btn-primary">Add Destination</a>
        <table class="table mt-4">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Location</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($destinations as $destination)
                    <tr>
                        <td>{{ $destination->name }}</td>
                        <td>{{ $destination->location }}</td>
                        <td>{{ $destination->description }}</td>
                        <td>
                            <a href="{{ route('destinations.show', $destination->id) }}" class="btn btn-info">View</a>
                            <a href="{{ route('destinations.edit', $destination->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('destinations.destroy', $destination->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
