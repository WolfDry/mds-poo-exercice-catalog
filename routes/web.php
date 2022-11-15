<?php

use App\Http\Controllers\GenreController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SeriesController;
use App\Models\Movie;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $movies = Movie::inRandomOrder()->whereNotNull('poster')->limit(12)->get();

    $random = Movie::inRandomOrder()->first();

    return view('home', ['movies' => $movies, 'random' => $random]);
});

Route::get('/movies', [MovieController::class, 'list']);
Route::get('/movies/random', [MovieController::class, 'random']);
Route::get('/movies/{id}', [MovieController::class, 'show']);

Route::get('/genres', [GenreController::class, 'list']);

Route::get('/series', [SeriesController::class, 'list']);
Route::get('/series/random', [SeriesController::class, 'random']);
Route::get('/series/{id}', [SeriesController::class, 'show']);
Route::get('/series/{id}/season/{season_num}', [SeriesController::class, 'seasonShow']);
Route::get('/series/{id}/season/{season_num}/episode/{episode_num}', [SeriesController::class, 'episodeShow']);

Route::get('/search', [SearchController::class, 'search']);
