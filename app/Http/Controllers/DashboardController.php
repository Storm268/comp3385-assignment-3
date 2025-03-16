<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index()
    {
        $clients = Client::all(); // Retrieve all clients
        return view('dashboard', compact('clients')); // Pass clients to view
    }
}
