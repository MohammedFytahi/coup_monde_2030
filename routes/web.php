<?php

use App\Http\Controllers\CycleEducativeController;
use App\Http\Controllers\MatiereController;
use App\Http\Controllers\TeamController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StadiumController;
use App\Http\Controllers\MatchController;

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



Route::get('/teams', [TeamController::class, 'index'])->name('teams.index');
Route::get('/teams/create', [TeamController::class, 'create'])->name('teams.create');
Route::post('/teams', [TeamController::class, 'store'])->name('teams.store');








Route::get('/matches', [MatchController::class, 'index'])->name('matches.index');
Route::get('/matches/create', [MatchController::class, 'create'])->name('matches.create');
Route::post('/matches/store', [MatchController::class, 'store'])->name('matches.store');



Route::get('/stadiums', [StadiumController::class, 'index'])->name('stadiums.index');
Route::get('/stadiums/create', [StadiumController::class, 'create'])->name('stadiums.create');
Route::post('/stadiums', [StadiumController::class, 'store'])->name('stadiums.store');
Route::put('/stadiums/{id}/edit',[StadiumController::class, 'edit'])->name('stadiums.edit');
Route::put('/stadiums/{id}', [StadiumController::class, 'update'])->name('stadiums.update');






Route::get('/matches', [MatchController::class, 'index'])->name('matches.index');
Route::get('/matches/create', [MatchController::class, 'create'])->name('matches.create');
Route::post('/matches/store', [MatchController::class, 'store'])->name('matches.store');

Route::get('/matches/{match}/edit', [MatchController::class, 'edit'])->name('matches.edit');
Route::put('/matches/{match}', [MatchController::class, 'update'])->name('matches.update');
Route::delete('/matches/{match}', [MatchController::class, 'destroy'])->name('matches.destroy');



require __DIR__.'/auth.php';
