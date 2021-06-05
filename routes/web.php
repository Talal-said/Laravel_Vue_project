<?php

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
//welcome page
Route::get('/', [\App\Http\Controllers\WelcomePageController::class, 'getData']);


//match controller
Route::resource('match', \App\Http\Controllers\MatchController::class)->middleware(['auth']);
// edited becuase we us axios.post not axios.put
Route::post('/match/{id}', [\App\Http\Controllers\MatchController::class, 'update'])->middleware(['auth']);
//for fetching data to vue-table-component
Route::get('/matches/getData', [\App\Http\Controllers\MatchController::class, 'getMatches'])->middleware(['auth']);


//league controller
Route::resource('league', \App\Http\Controllers\myController::class)->middleware(['auth']);
// edited becuase we us axios.post not axios.put
Route::post('/league/{id}', [\App\Http\Controllers\myController::class, 'update'])->middleware(['auth']);
//for fetching data to vue-table-component
Route::get('/leagues/get-data', [\App\Http\Controllers\myController::class, 'getData'])->middleware(['auth']);


//team controller
Route::resource('team', \App\Http\Controllers\TeamController::class)->middleware(['auth']);
// edited becuase we us axios.post not axios.put
Route::post('/team/{id}', [\App\Http\Controllers\TeamController::class, 'update'])->middleware(['auth']);
//for fetching data to vue-table-component
Route::get('/teams/getData', [\App\Http\Controllers\TeamController::class, 'getTeams'])->middleware(['auth']);
//for reviewing the image
Route::post('/upload', [\App\Http\Controllers\TeamController::class, 'upload'])->middleware(['auth']);

//Route::get('/dashboard', [\App\Http\Controllers\MatchController::class, 'index'])->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
