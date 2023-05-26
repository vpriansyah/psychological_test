<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AjuanController;
use App\Http\Controllers\AlurController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\ContactusController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\Paket_soalController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RulesController;
use App\Http\Controllers\View_laporanController;
use Illuminate\Support\Facades\Route;

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






// <!-- Landing Page -->

Route::get('/home', function () {
    return view('index');
});
Route::get('/', function () {
    return view('index');
});

Route::get('/direct', [DashboardController::class, 'index']);
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'Auth']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/ajuan', [AjuanController::class, 'index'])->name('ajuan');
Route::post('/ajuan', [AjuanController::class, 'store']);
Route::post('/contact', [ContactusController::class, 'store']);

// <!-- /Landing Page -->






// <!-- User Route -->
Route::middleware(['auth', 'UserMid'])->group(function () {
    Route::get('/user', function () {
        return view('user/dashboard_user');
    });
    Route::get('/profile', [ProfileController::class, 'index']);
    Route::get('/exam', [ExamController::class, 'index']);
});

// <!-- / User Route -->





// <!-- Admin Route -->
Route::middleware(['auth', 'AdminMid'])->group(function () {
    Route::get('/admin', function () {
        return view('admin/dashboard_admin');
    });
    Route::get('/account', [AccountController::class, 'index']);
    Route::post('/account', [AccountController::class, 'store']);
    Route::delete('/account/{id}', [AccountController::class, 'destroy']);
    Route::get('/notification', [NotificationController::class, 'index']);
    Route::get('/paket_soal', [Paket_soalController::class, 'index']);
    Route::post('/paket_soal', [Paket_soalController::class, 'store']);
    Route::delete('/paket_soal/{id}', [Paket_soalController::class, 'destroy']);
    Route::get('/laporan', [LaporanController::class, 'index']);
});

// <!-- /  Admin Route -->





// <!-- HRD Route -->
Route::middleware(['auth', 'HrdMid'])->group(function () {
    Route::get('/hrd', function () {
        return view('hrd/dashboard_hrd');
    });
    Route::get('/rules', [RulesController::class, 'index']);
    Route::post('/rules', [RulesController::class, 'store']);
    Route::delete('/rules/{id}', [RulesController::class, 'destroy']);
    Route::get('/alur', [AlurController::class, 'index']);
    Route::post('/alur', [AlurController::class, 'store']);
    Route::delete('/alur/{id}', [AlurController::class, 'destroy']);
    Route::get('/view_laporan', [View_laporanController::class, 'index']);
});
// <!-- HRD Route -->
