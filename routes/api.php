<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PersonalController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/**
 * ini otomatis akan membuat route untuk semua fungsi di controller (index, show, store, update, destroy)
 */
Route::apiResource('patients', PatientController::class);

/**
 * Seluruh route yang ada di dalam group ini, akan di-protect dengan middleware Sanctum
 */
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user(); //Untuk menampilkan data user yang sedang login
    });

    Route::get('/patients/search/{name}', [PatientController::class, 'search']);
    Route::get('/patients/status/negative', [PatientController::class, 'negative']);
    Route::get('/patients/status/positive', [PatientController::class, 'positive']);
    Route::get('/patients/status/recovered', [PatientController::class, 'recovered']);
    Route::get('/patients/status/dead', [PatientController::class, 'dead']);
    Route::post('/logout', [AuthController::class, 'logout']);
});

/**
 * Dibawah ini adalah route yang tidak di-protect dengan middleware Sanctum
 */
Route::get('/', PersonalController::class);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
