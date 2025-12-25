<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController; // ← ناقصة
use App\Http\Controllers\HomeController; // ← ناقصة
use App\Http\Controllers\managercontroller;
use App\Http\Controllers\drivercontroller;
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// صفحة المدير
Route::get('/manger', function () {
    return view('manger.mdashboard', [
        'bus_count' => 15,
        'driver_count' => 25,
        'station_count' => 12
    ]);
})->name('manger.dashboard');
/*
// 1. Buses Page (مؤقت)
Route::get('/buses', function () {
    return '
    <!DOCTYPE html>
    <html>
    <head>
        <title>Buses</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body class="bg-light">
        <div class="container mt-5">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h3>🚌 Buses Management</h3>
                </div>
                <div class="card-body">
                    <p>This page is under construction</p>
                    <a href="/manger" class="btn btn-secondary">← Back to Dashboard</a>
                </div>
            </div>
        </div>
    </body>
    </html>
    ';
})->name('buses.index');


// 4. Logout (مؤقت)
Route::post('/logout', function () {
    return redirect('/')->with('success', 'Logged out successfully!');
})->name('logout');
Route::get('/test-edit/{id}', function ($id) {
    return "<h1>Editing Bus #{$id}</h1>";
});
// Route لحذف الباص
Route::delete('/delete-bus/{id}', function ($id) {
    return 'Bus #' . $id . ' deleted (simulated)';
});*/
Route::get('/driver/dashboard', [driverController::class, 'dashboard'])
->name('driver.dashboard');

// route new bus
Route::get('/bus/buscreae', function () {
    return view('bus.buscreae');
})->name('bus.buscreae');

//rout the new driver
Route::get('/driver/drivercreat',function()
{
    return view('driver.drivercreate');
})->name('driver.drivercreat');
