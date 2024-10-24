<x-app-layout :assets="$assets ?? []">
    <div class="tours-content">
        <h1>Available Trips</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('tours.create') }}" class="btn btn-primary mb-3 mt-3">Add a Trip</a>

        <!-- Table to display the list of trips -->
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Date</th>
                    <th>Duration (hours)</th>
                    <th>Price (€)</th>
                    <th>Seats Available</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tours as $tour)
                    <tr>
                        <td>{{ $tour->id }}</td>
                        <td>
                            <a href="{{ route('tours.show', $tour) }}">{{ $tour->title }}</a>
                        </td>
                        <td>{{ $tour->description }}</td>
                        <td>{{ \Carbon\Carbon::parse($tour->date)->format('d-m-Y') }}</td>
                        <td>{{ $tour->duration }}</td>
                        <td>{{ number_format($tour->price, 2, ',', ' ') }} €</td>
                        <td>{{ $tour->nb_place }}</td>
                        <td>
                            <!-- Buttons for actions: update, delete, share -->
                            <a href="{{ route('tours.edit', $tour) }}" class="btn btn-warning btn-sm">Update Trip</a>

                            <form action="{{ route('tours.destroy', $tour) }}" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this trip?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete Trip</button>
                            </form>

                            <!-- Example of a social share button -->
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('tours.show', $tour->id)) }}" class="btn btn-primary btn-sm" target="_blank">Share on Facebook</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination for large lists -->
        {{ $tours->links() }}
    </div>

    <style>
        .tours-content {
            margin: 20px;
            padding: 20px;
            border: 1px solid #ddd;
            background-color: #f9f9f9;
            border-radius: 5px;
        }
    </style>
</x-app-layout>
