<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\PinjamController;
use App\Http\Controllers\RakbukuController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SesiController;
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

Route::middleware(['guest'])->group(function() {
    Route::get('/', [SesiController::class, 'index'])->name('login');
    Route::post('/', [SesiController::class, 'login']);
});
Route::get('/home', function() {
    return redirect('admin');
});

Route::middleware(['auth'])->group(function() {
    Route::get('/admin', [AdminController::class, 'index']);
    Route::resource('/administrator', RakbukuController::class)->middleware('UserAkses:administrator');
    Route::patch('administrator/{id}', [RakbukuController::class, 'update'])->name('administrator.update');
    Route::get('administrator/view/pdf', [PdfController::class, 'view_pdf'])->name('view_pdf');
    Route::resource('/petugas', PetugasController::class)->middleware('UserAkses:petugas');
    Route::patch('petugas/{id}', [PetugasController::class, 'update'])->name('petugas.update');
    Route::get('petugas/view/pdf', [PdfController::class, 'view_pdf'])->name('view_pdf');
    Route::resource('/peminjam', PinjamController::class)->middleware('UserAkses:peminjam');
    Route::patch('peminjam/{id}', [PinjamController::class, 'update'])->name('peminjam.update');
    Route::get('/logout', [SesiController::class, 'logout']);
});

Route::get('/Register', [RegisterController::class, 'index']);
Route::post('/Register', [RegisterController::class, 'create'])->name('Register');