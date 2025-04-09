<?php

use App\Http\Controllers\API\ActivityController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\CourseController;
use App\Http\Controllers\API\DomainController;
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

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', [AuthController::class, 'me']);
    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::apiResource('/domaines', DomainController::class);
Route::apiResource('/courses', CourseController::class);
Route::apiResource('/activities', ActivityController::class);
