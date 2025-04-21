<?php

use App\Http\Controllers\MapController;
use App\Http\Controllers\ValidMissionController;
use App\Models\Demande;
use App\Models\Point;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
// Route::get('/', function () {
//     return view('welcome');
// });


Route::redirect('/', '/admin');

Route::get('/data/{map}/{z}/{x}/', [MapController::class, 'index'])->name('admin.map');

/*Route::get('/api/points', function () {
    return Demande::with('icon')->get(); // Ensure the icon relationship is included
});*/

//Route::get('/admin/missions/valid', [ValidMissionController::class, 'index'])->name('missions.valid');