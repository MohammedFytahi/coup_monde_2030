<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CycleEducativeController;
use App\Http\Controllers\MatiereController;
use App\Http\Controllers\TeamController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StadiumController;
use App\Http\Controllers\MatchController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\ArticleController;

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
})->name('home');



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






// Route::get('/matches', [MatchController::class, 'index'])->name('matches.index');
// Route::get('/matches/create', [MatchController::class, 'create'])->name('matches.create');
// Route::post('/matches/store', [MatchController::class, 'store'])->name('matches.store');

Route::get('/matches/{match}/edit', [MatchController::class, 'edit'])->name('matches.edit');
Route::put('/matches/{match}', [MatchController::class, 'update'])->name('matches.update');
Route::delete('/matches/{match}', [MatchController::class, 'destroy'])->name('matches.destroy');

Route::post('/reserve-ticket/{match_id}', [TicketController::class,'reserveTicket'])->name('reserve-ticket');
Route::get('/ticket-confirmation/{ticket_id}', [TicketController::class, 'ticketConfirmation'])->name('ticket-confirmation');

Route::post('/tickets/download-pdf/{ticket_id}', [TicketController::class, 'generatePDF'])->name('tickets.download-pdf');

Route::get('/matches/{matchId}/add-scores', [MatchController::class, 'create_result'])->name('match_results.create');
Route::post('/matches/{matchId}/add-scores', [MatchController::class, 'store_result'])->name('match_results.store');

Route::get('/match_results/{match}', [MatchController::class, 'show'])->name('match_results.show');

Route::get('/admin/dashboard',[AdminController::class,'index'])->name('dashboard');


Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create');
Route::post('/articles', [ArticleController::class, 'store'])->name('articles.store');
require __DIR__.'/auth.php';
