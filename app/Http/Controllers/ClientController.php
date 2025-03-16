<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{
    // Show the client form
    public function create()
    {
        return view('clients.add');
    }

    // Store new client
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:clients,email',
            'telephone' => 'required|string|max:20',
            'address' => 'required|string',
            'company_logo' => 'required|image|mimes:jpg,png|max:2048',
        ]);

        // Store image and get the path
        $logoPath = $request->file('company_logo')->store('logos', 'public');

        // Save client data
        Client::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'telephone' => $validated['telephone'],
            'address' => $validated['address'],
            'company_logo' => $logoPath,
        ]);

        return redirect('/dashboard')->with('success', 'Client added successfully!');
    }
}
