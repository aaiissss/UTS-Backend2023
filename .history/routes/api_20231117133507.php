<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


# Route pasiencovid
# Method GET
Route::get('/pasiencovid', [pasiencovidController::class, 'index']);

# Method POST
Route::post('/pasiencovid', [pasiencovidController::class, 'store']);

#Method delete
Route::delete('/pasiencovid/{id}', [pasiencovidController::class, 'destroy']);

#method put
Route::put('/pasiencovid/{id}', [pasiencovidController::class, 'update']);
