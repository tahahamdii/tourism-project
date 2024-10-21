<x-app-layout>
    <div class="tour-details">
        <h1>{{ $tour->title }}</h1>
        <p>{{ $tour->description }}</p>
        <p>Date: {{ \Carbon\Carbon::parse($tour->date)->format('d-m-Y') }}</p>
        <p>Duration: {{ $tour->duration }} hours</p>
        <p>Price: {{ number_format($tour->price, 2, ',', ' ') }} €</p>
        <p>Number of Seats: {{ $tour->nb_place }}</p>
    </div>
</x-app-layout>
