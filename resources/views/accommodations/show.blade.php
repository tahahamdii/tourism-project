<x-app-layout :assets="$assets ?? []">
    <div class="accommodation-detail-content container mt-5">
        <h1 class="mb-4 text-center">Details Hébergement</h1>

        <div class="card shadow-sm">
            <div class="card-body">
                <div class="text-center mb-4">
                    <h2>{{ $accommodation->name }}</h2> <!-- Display Accommodation Name -->
                </div>
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <div class="attribute-box">
                            <i class="fas fa-map-marker-alt"></i>
                            <div>
                                <h5>Adresse</h5>
                                <p>{{ $accommodation->address }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mb-3">
                        <div class="attribute-box">
                            <i class="fas fa-dollar-sign"></i>
                            <div>
                                <h5>Prix par nuit</h5>
                                <p>${{ $accommodation->price_per_night }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-center mt-4">
                    <a href="{{ route('accommodations.index') }}" class="btn btn-secondary">Retour</a>
                </div>
            </div>
        </div>
    </div>

    <style>
        .accommodation-detail-content {
            padding: 20px;
            border-radius: 8px;
            background-color: #f8f9fa; /* Light background for contrast */
        }

        .attribute-box {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            text-align: center;
            background-color: #fff; /* White background for boxes */
            transition: box-shadow 0.3s;
        }

        .attribute-box:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Add shadow on hover */
        }

        .attribute-box i {
            font-size: 2rem; /* Icon size */
            color: #007bff; /* Icon color */
            margin-bottom: 10px; /* Space between icon and text */
        }

        .attribute-box h5 {
            margin: 0; /* Remove default margin */
            font-size: 1.25rem; /* Title size */
            color: #343a40; /* Dark color for the title */
        }

        .attribute-box p {
            margin: 0; /* Remove default margin */
            font-size: 1rem; /* Text size */
        }
    </style>

    <!-- Include Font Awesome CDN -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</x-app-layout>
