@extends('layouts.navbar')

@section('content') <!-- Start content section -->
   
   <div class="accommodations-content">
        <h1>Accommodations</h1>

        <!-- Table to display the list of accommodations -->
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Adresse</th>
                <th>Prix par nuit</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($accommodations as $accommodation)
                <tr>
                    <td>{{ $accommodation->id }}</td>
                    <td>
                        <a href="{{ route('accommodations.show', $accommodation) }}">{{ $accommodation->name }}</a>
                    </td>
                    <td>{{ $accommodation->address }}</td>
                    <td>{{ $accommodation->price_per_night }} $</td>
                    <td>
                        <!-- Button to edit the accommodation -->
                        <a class="btn btn-warning btn-sm">Make Reservation</a>

                        
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    @endsection <!-- End content section -->

    <style>
        .accommodations-content {
            margin: 20px;
            padding: 20px;
            border: 1px solid #ddd;
            background-color: #f9f9f9;
            border-radius: 5px;
        }
    </style>
