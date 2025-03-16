<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

// Display login form (GET request)
Route::get('/login', [AuthController::class, 'create'])->name('login');

// Handle login submission (POST request)
Route::post('/login', [AuthController::class, 'store']);

// Protect the dashboard route with authentication middleware
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');

Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/login');
});

// Show the form
Route::get('/clients/add', [ClientController::class, 'create'])->middleware('auth');

// Handle form submission
Route::post('/clients', [ClientController::class, 'store'])->middleware('auth');

Route::get('/login', [AuthController::class, 'create'])->name('login');

Route::post('/login', [AuthController::class, 'store']);
// Create additional Routes below
