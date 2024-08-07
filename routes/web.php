<?php

use App\Models\Dosen;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PublikasiController;
use App\Http\Controllers\SuratTugasController;
use App\Http\Controllers\SuratKetetapanController;

// Route::get('/', function () {
//     return view('dashboard.index', [
//         'title' => 'Dashboard'
//     ]);
// })->middleware('auth');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
Route::put('/surattugas/{id}', [SuratTugasController::class, 'update'])->name('surattugas.update');

Route::resource('/', DashboardController::class)->middleware('auth');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');
Route::post('surattugas/import', [SuratTugasController::class, 'ImportExcelData']);
Route::resource('/user', UserController::class)->middleware('auth');
Route::resource('/dosen', DosenController::class)->middleware('auth');
Route::resource('/surattugas', SuratTugasController::class)->middleware('auth');
Route::resource('/publikasi', PublikasiController::class)->middleware('auth');
Route::resource('/suratketetapan', SuratKetetapanController::class)->middleware('auth');

Route::patch('/surat_tugas/{id}/toggle-visibility', [DosenController::class, 'toggleVisibility'])->name('surat_tugas.toggleVisibility');

Route::get('/dosen/show', [DosenController::class, 'show'])->name('dosen.show');

Route::get('/show', function () {
    return view('index', [
        'title' => 'Daftar Dosen',
        'dosen' => Dosen::all()
    ]);
})->middleware('auth');


