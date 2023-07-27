<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PosisiController;
use App\Http\Controllers\PostmenController;

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

Route::get('/posisi', [PostmenController::class, 'posisi']);
Route::get('/soal', [PostmenController::class, 'soal']);
Route::get('/user', [PostmenController::class, 'profile']);
Route::get('/rules', [PostmenController::class, 'rules']);
Route::get('/alur', [PostmenController::class, 'alur']);
Route::get('/laporan', [PostmenController::class, 'laporan']);
