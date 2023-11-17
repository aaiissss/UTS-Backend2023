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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

#bungkus route dengan middleware sanctum
Route::middleware('auth:sanctum')->group(function () {
    # Method GET, route /pasiencovid
    Route::get('/pasiencovid', [pasiencovidController::class, 'index']);
    # Create pasiencovid
    Route::post('/pasiencovid', [pasiencovidController::class, 'store']);
    # Update pasiencovid
    Route::put('/pasiencovid/{id}', [pasiencovidController::class, 'update']);
    # Delete pasiencovid
    Route::delete('/pasiencovid/{id}', [pasiencovidController::class, 'destroy']);
});

# untuk register dan login pake auth
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

# Route pasiencovid
# Method GET
Route::get('/pasiencovid', [pasiencovidController::class, 'index']);

# Method POST
Route::post('/pasiencovid', [pasiencovidController::class, 'store']);

#Method delete
Route::delete('/pasiencovid/{id}', [pasiencovidController::class, 'destroy']);

#method put
Route::put('/pasiencovid/{id}', [pasiencovidController::class, 'update']);
