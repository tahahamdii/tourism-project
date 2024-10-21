@extends('layouts.navbar')

@section('title', 'Home - Tourisme Durable')

@section('content')
    <div class="header">
        <div class="container">
            <div class="tourisme-durable-content text-center text-black mt-5">
                <h1 class="section-title">Look deep into nature, and then you will understand everything better</h1>
                {{-- <p class="lead">
                    Sustainable tourism is a form of tourism that respects, preserves, and enhances the natural, cultural, and social resources of a destination. It aims to minimize negative environmental impacts while maximizing economic and social benefits for local communities.
                </p> --}}
                <img src="{{ asset('storage/photos/istockphoto-1372488167-612x612.jpg') }}" alt="Tourisme Durable" class="img-fluid mb-4 tourisme-durable-image mt-5">
            </div>
        </div>
    </div>

    <style>
        .header {
            position: relative;
            background-size: cover;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: rgb(0, 0, 0);
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
        }

        .tourisme-durable-content {
            margin-top: 50px;
        }

        .tourisme-durable-image {
            max-width: 100%;
            height: auto;
            width: 80%;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .section-title {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 30px;
            color: #50e758;
            text-transform: uppercase;
        }

        .lead {
            font-size: 1.2rem;
            margin-bottom: 30px;
            color: #000000;
        }
    </style>
@endsection
