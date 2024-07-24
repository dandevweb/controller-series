<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Authenticated;
use App\Http\Controllers\SeasonController;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EpisodesController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/', function () {
        return to_route('series.index');
    })->name('home');

    Route::resource('/series', SeriesController::class);

    Route::get('series/{series}/seasons', [SeasonController::class, 'index'])
        ->name('seasons.index');

    Route::get('seasons/{season}/episodes', [EpisodesController::class, 'index'])->name('episodes.index');
    Route::post('seasons/{season}/episodes', [EpisodesController::class, 'update'])->name('episodes.update');
});

require __DIR__.'/auth.php';