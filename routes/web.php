<?php

use App\Http\Controllers\MapController;
use App\Models\Point;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/map', [MapController::class, 'index'])->name('admin.map');

Route::get('/api/points', function () {
    return Point::with('icon')->get(); // Ensure the icon relationship is included
});
