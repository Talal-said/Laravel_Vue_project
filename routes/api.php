<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => 'auth:api'], function(){
    Route::get('/getMatches', [\App\Http\Controllers\Api\ApiController::class, 'getMatches']);
    Route::get('/search', [\App\Http\Controllers\Api\ApiController::class, 'search']);
});

Route::post('/login', [\App\Http\Controllers\Api\ApiController::class, 'login']);
Route::post('/register', [\App\Http\Controllers\Api\ApiController::class, 'register']);
