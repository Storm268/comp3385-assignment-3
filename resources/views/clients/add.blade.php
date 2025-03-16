@extends('layouts.app')

@section('content')
    <h1>Create Client</h1>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="/clients" enctype="multipart/form-data">
        @csrf
        <label>Name *</label>
        <input type="text" name="name" required><br>

        <label>Email *</label>
        <input type="email" name="email" required><br>

        <label>Phone *</label>
        <input type="text" name="telephone" required><br>

        <label>Address *</label>
        <input type="text" name="address" required><br>

        <label>Company Logo *</label>
        <input type="file" name="company_logo" required><br>

        <button type="submit">Create</button>
    </form>
@endsection
