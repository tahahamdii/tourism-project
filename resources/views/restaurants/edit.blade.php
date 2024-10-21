<x-app-layout :assets="$assets ?? []">
    <div class="edit-restaurant-content">
        <h1>Modify Restaurant Information</h1>

        <form action="{{ route('restaurants.update', $restaurant->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label"><strong>Restaurant Name:</strong></label>
                <input type="text" class="form-control" name="name" id="name" value="{{ $restaurant->name }}" required>
            </div>

            <div class="mb-3">
                <label for="cuisine_type" class="form-label"><strong>Cuisine Type:</strong></label>
                <select class="form-select" name="cuisine_type" id="cuisine_type" required>
                    <option value="" disabled selected>Select a cuisine type</option>
                    <option value="French" {{ $restaurant->cuisine_type == 'French' ? 'selected' : '' }}>French</option>
                    <option value="Italian" {{ $restaurant->cuisine_type == 'Italian' ? 'selected' : '' }}>Italian</option>
                    <option value="Chinese" {{ $restaurant->cuisine_type == 'Chinese' ? 'selected' : '' }}>Chinese</option>
                    <option value="Japanese" {{ $restaurant->cuisine_type == 'Japanese' ? 'selected' : '' }}>Japanese</option>
                    <option value="Indian" {{ $restaurant->cuisine_type == 'Indian' ? 'selected' : '' }}>Indian</option>
                    <!-- Add more cuisine types as needed -->
                </select>
            </div>

            <div class="mb-3">
                <label for="restaurant_image" class="form-label"><strong>Restaurant Image:</strong></label>
                <input type="file" class="form-control" name="restaurant_image" id="restaurant_image" accept="image/*">
                @if($restaurant->restaurant_image)
                    <div class="image-preview mt-3">
                        <img src="{{ asset('storage/' . $restaurant->restaurant_image) }}" alt="Restaurant Image" class="img-fluid img-thumbnail">
                    </div>
                @endif
            </div>

            <div class="mb-3">
                <label for="address" class="form-label"><strong>Address:</strong></label>
                <input type="text" class="form-control" name="address" id="address" value="{{ preg_replace('/\s*\(Lat:.*?Lng:.*?\)\s*/', '', $restaurant->address) }}" required>
            </div>

            <div class="mb-3">
                <label for="map" class="form-label"><strong>Location on Map:</strong></label>
                <div id="map" style="height: 300px; width: 100%;"></div>
                <button type="button" id="locateMe" class="btn btn-secondary mt-2">Locate Me</button>
            </div>

            <input type="hidden" name="latitude" id="latitude" value="{{ $restaurant->latitude }}">
            <input type="hidden" name="longitude" id="longitude" value="{{ $restaurant->longitude }}">

            <div class="mb-3 button-group">
                <button type="submit" class="btn btn-success">Update</button>
                <a href="{{ route('restaurants.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>

    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <!-- Leaflet JavaScript -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Default latitude and longitude from the restaurant model
            const lat = {{ $restaurant->latitude ?? 36.835668247244406 }};
            const lng = {{ $restaurant->longitude ?? 10.303136514168322 }};

            // Initialize map centered on restaurant's location
            const map = L.map('map').setView([lat, lng], 13);

            // Set map tiles source
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
            }).addTo(map);

            // Add marker to map
            const marker = L.marker([lat, lng]).addTo(map)
                .bindPopup("<b>{{ $restaurant->name }}</b><br>{{ preg_replace('/\s*\(Lat:.*?Lng:.*?\)\s*/', '', $restaurant->address) }}")
                .openPopup();

            // Update latitude and longitude on marker drag
            marker.on('dragend', function(e) {
                const position = marker.getLatLng();
                document.getElementById('latitude').value = position.lat;
                document.getElementById('longitude').value = position.lng;
            });

            // Make the marker draggable
            marker.dragging.enable();

            // Get user's current location
            document.getElementById('locateMe').addEventListener('click', function() {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function(position) {
                        const lat = position.coords.latitude;
                        const lng = position.coords.longitude;
                        map.setView([lat, lng], 13);
                        marker.setLatLng([lat, lng]);
                        document.getElementById('latitude').value = lat;
                        document.getElementById('longitude').value = lng;

                        // Reverse geocoding to get the address
                        fetch(`https://nominatim.openstreetmap.org/reverse?lat=${lat}&lon=${lng}&format=json`)
                            .then(response => response.json())
                            .then(data => {
                                if (data && data.display_name) {
                                    const fullAddress = `${data.display_name} (Lat: ${lat}, Lng: ${lng})`;
                                    document.getElementById('address').value = fullAddress;
                                }
                            })
                            .catch(error => console.error('Error retrieving address:', error));
                    }, function() {
                        alert('Unable to retrieve your location.');
                    });
                } else {
                    alert('Geolocation is not supported by this browser.');
                }
            });

            // Click event to set marker position
            map.on('click', function(e) {
                const latlng = e.latlng;
                marker.setLatLng(latlng);
                document.getElementById('latitude').value = latlng.lat;
                document.getElementById('longitude').value = latlng.lng;

                // Reverse geocoding to get the address
                fetch(`https://nominatim.openstreetmap.org/reverse?lat=${latlng.lat}&lon=${latlng.lng}&format=json`)
                    .then(response => response.json())
                    .then(data => {
                        if (data && data.display_name) {
                            const fullAddress = `${data.display_name} (Lat: ${latlng.lat}, Lng: ${latlng.lng})`;
                            document.getElementById('address').value = fullAddress;
                        }
                    })
                    .catch(error => console.error('Error retrieving address:', error));
            });
        });
    </script>

    <style>
        .edit-restaurant-content {
            margin: 20px;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .edit-restaurant-content h1 {
            font-size: 2rem;
            color: #333;
            margin-bottom: 20px;
        }

        .form-label {
            font-weight: bold;
            color: #333;
            margin-bottom: 5px;
        }

        .form-control, .form-select {
            border-radius: 5px;
            border: 1px solid #ccc;
            padding: 10px;
            font-size: 1rem;
        }

        .btn-secondary, .btn-success {
            padding: 6px 12px;
            font-size: 0.875rem;
            border-radius: 5px;
            font-weight: bold;
            text-transform: uppercase;
            transition: background-color 0.3s ease;
        }

        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
            color: #fff;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
            border-color: #545b62;
        }

        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
            color: #fff;
        }

        .btn-success:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }

        .button-group {
            display: flex;
            gap: 10px;
        }

        .image-preview {
            display: flex;
            justify-content: center;
            margin-top: 10px;
        }

        .img-thumbnail {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
    </style>
</x-app-layout>
