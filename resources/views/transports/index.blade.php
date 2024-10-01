@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Transports</h1>
        <a href="{{ route('transports.create') }}" class="btn btn-primary">Add Transport</a>
        <table class="table mt-4">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Company</th>
                    <th>Location</th>
                    <th>Date</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transports as $transport)
                    <tr>
                        <td>{{ $transport->name }}</td>
                        <td>{{ $transport->type }}</td>
                        <td>{{ $transport->company }}</td>
                        <td>{{ $transport->location }}</td>
                        <td>{{ $transport->date }}</td>
                        <td>{{ $transport->description }}</td>
                        <td>
                            <a href="{{ route('transports.show', $transport->id) }}" class="btn btn-info">View</a>
                            <a href="{{ route('transports.edit', $transport->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('transports.destroy', $transport->id) }}" method="POST" style="display:inline-block;">
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
