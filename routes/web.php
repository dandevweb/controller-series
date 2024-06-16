<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Authenticated;
use App\Http\Controllers\SeasonController;
use App\Http\Controllers\SeriesController;
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

Route::get('login', [LoginController::class, 'index'])->name('login');

Route::post('login', [LoginController::class, 'login'])->name('login.do');

Route::get('register', [RegisterController::class, 'index'])->name('register');
Route::post('register', [RegisterController::class, 'store'])->name('register.do');

Route::middleware(Authenticated::class)->group(function () {
    Route::post('logout', function () {
        auth()->logout();
        return redirect()->route('login');
    })->name('logout');

    Route::get('/', function () {
        return to_route('series.index');
    })->name('home');
    Route::resource('/series', SeriesController::class);

    Route::get('series/{series}/seasons', [SeasonController::class, 'index'])
        ->name('seasons.index');

    Route::get('seasons/{season}/episodes', [EpisodesController::class, 'index'])->name('episodes.index');
    Route::post('seasons/{season}/episodes', [EpisodesController::class, 'update'])->name('episodes.update');
});