@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="display-5 fw-bold text-body-emphasis">Dashboard</h1>
        <p class="lead">Welcome to your dashboard. Here you can manage your account, your clients, and much more.</p>
        
        <!-- Create Client Button -->
        <a href="/clients/add" class="btn btn-primary">+ Create Client</a>

        <!-- Display Clients -->
        <div class="row mt-4">
            @foreach($clients as $client)
                <div class="col-md-4">
                    <div class="card text-center p-3 mb-4">
                        <img src="{{ asset('storage/' . $client->company_logo) }}" alt="Logo" class="card-img-top" style="max-height: 150px; object-fit: contain;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $client->name }}</h5>
                            <p class="card-text">
                                <strong>Email:</strong> {{ $client->email }} <br>
                                <strong>Phone:</strong> {{ $client->telephone }} <br>
                                <strong>Address:</strong> {{ $client->address }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
        <!-- Logout Button -->
            <form method="POST" action="/logout">
            @csrf
            <button type="submit">Logout</button>
        </form>
        <form method="POST" action="/logout" class="d-inline">
            @csrf
            <button type="submit" class="btn btn-danger">Logout</button>
        </form>
        
@endsection
