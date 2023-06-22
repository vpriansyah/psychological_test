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
use App\Http\Controllers\ProfileEditController;
use App\Http\Controllers\RulesController;
use App\Http\Controllers\View_laporanController;
use App\Http\Controllers\ViewUserController;
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

    Route::get('/user', [ViewUserController::class, 'index']);

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('/profileEdit', [ProfileEditController::class, 'index']);
    Route::put('/profileEdit/{id}', [ProfileEditController::class, 'update']);

    Route::middleware(['CekProfileUser'])->group(function () {
        Route::get('/exam', [ExamController::class, 'index'])->name('exam');
        Route::get('/quiz-add', [ExamController::class, 'addHasilTest']);

        Route::middleware(['CekQuiz'])->group(function () {
            Route::get('/quiz', [ExamController::class, 'indexquiz']);
            Route::post('/submitquiz', [ExamController::class, 'submit']);
        });
        Route::get('/result', [ExamController::class, 'result']);
    });
});

// <!-- / User Route -->





// <!-- Admin Route -->
Route::middleware(['auth', 'AdminMid'])->group(function () {
    Route::get('/admin', [AccountController::class, 'index_dashboard']);
    Route::get('/account', [AccountController::class, 'index']);
    Route::post('/account', [AccountController::class, 'store']);
    Route::get('/changeStatus', [AccountController::class, 'changeUserStatus']);
    Route::delete('/account/{id}', [AccountController::class, 'destroy']);
    Route::put('/account/edit/{id}', [AccountController::class, 'update']);

    Route::get('/notification', [NotificationController::class, 'index']);
    Route::delete('/notification/{id}', [NotificationController::class, 'destroy']);
    Route::get('/changeStatusAjuan', [NotificationController::class, 'changeAjuanStatus']);

    Route::get('/soal', [Paket_soalController::class, 'index']);
    Route::post('/soal', [Paket_soalController::class, 'store']);
    Route::delete('/soal/{id}', [Paket_soalController::class, 'destroy']);
    Route::put('/soal/edit/{id}', [Paket_soalController::class, 'update']);

    Route::get('/kategori', [Paket_soalController::class, 'index_kategori']);
    Route::post('/kategori', [Paket_soalController::class, 'store_kategori']);
    Route::delete('/kategori/{id}', [Paket_soalController::class, 'destroy_kategori']);
    Route::put('/kategori/edit/{id}', [Paket_soalController::class, 'update_kategori']);

    Route::get('/informasi', [Paket_soalController::class, 'index_informasi']);
    Route::post('/informasi', [Paket_soalController::class, 'store_informasi']);
    Route::delete('/informasi/{id}', [Paket_soalController::class, 'destroy_informasi']);
    Route::put('/informasi/edit/{id}', [Paket_soalController::class, 'update_informasi']);


    Route::get('/laporan', [LaporanController::class, 'index']);
    Route::delete('/laporan/{id}', [LaporanController::class, 'destroy']);
    Route::put('/laporan/edit/{id}', [LaporanController::class, 'update']);
});

// <!-- /  Admin Route -->





// <!-- HRD Route -->
Route::middleware(['auth', 'HrdMid'])->group(function () {
    Route::get('/hrd', function () {
        return view('hrd/dashboard_hrd');
    });
    Route::get('/rules', [RulesController::class, 'index']);
    Route::post('/rules', [RulesController::class, 'store']);
    Route::put('/rules/edit/{id}', [RulesController::class, 'update']);
    Route::delete('/rules/{id}', [RulesController::class, 'destroy']);

    Route::get('/alur', [AlurController::class, 'index']);
    Route::post('/alur', [AlurController::class, 'store']);
    Route::put('/alur/edit/{id}', [AlurController::class, 'update']);
    Route::delete('/alur/{id}', [AlurController::class, 'destroy']);

    Route::get('/view_laporan', [View_laporanController::class, 'index']);
    Route::get('/print_laporan_hrd', [View_laporanController::class, 'print']);
});
// <!-- HRD Route -->
