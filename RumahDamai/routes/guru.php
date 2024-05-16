<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Guru\Raport\RaportController;
use App\Http\Controllers\Guru\PPI\PPIModelAController;
use App\Http\Controllers\Guru\Materi\ModulMateriController;
use App\Http\Controllers\Guru\Materi\SilabusController;
use App\Http\Controllers\Admin\Administrator\AdministratorController;



Route::middleware(['auth', 'user-access:guru'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Raport
    |--------------------------------------------------------------------------
    */
    Route::get('/raport', [RaportController::class, 'index'])->name('raport.index');
    Route::get('/raport/show/{id}', [RaportController::class, 'show'])->name('raport.show');
    Route::get('/raport/create', [RaportController::class, 'create'])->name('raport.create');
    Route::post('/raport/store', [RaportController::class, 'store'])->name('raport.store');
    Route::get('/raport/edit/{id}', [RaportController::class, 'edit'])->name('raport.edit');
    Route::put('/raport/update/{id}', [RaportController::class, 'update'])->name('raport.update');
    Route::delete('/raport/destroy/{id}', [RaportController::class, 'destroy'])->name('raport.destroy');
    Route::get('/raport/detail/{id}', [RaportController::class, 'detail'])->name('raport.detail');
    Route::get('/raport/pdf/{id}', [RaportController::class, 'pdf'])->name('raport.pdf');


    /*
    |--------------------------------------------------------------------------
    | Modul Materi
    |--------------------------------------------------------------------------
    */
    Route::resource('/materi/modulMateri', ModulMateriController::class);
    Route::get('/materi/download/{id}', [ModulMateriController::class, 'download'])->name('modulMateri.download');
    Route::resource('/materi/silabus', SilabusController::class);
    Route::post('/modul-materi/{modulMateri}/tambah-jadwal', [ModulMateriController::class, 'tambahJadwalPembelajaran'])->name('modulMateri.tambahJadwal');


    /*
    |--------------------------------------------------------------------------
    | PPI A
    |--------------------------------------------------------------------------
    */
    Route::get('/ppiA', [PPIModelAController::class, 'index'])->name('PPI.ModelA.index');
    Route::get('/ppiA/show/{id}', [PPIModelAController::class, 'show'])->name('PPI.ModelA.show');
    Route::get('/ppiA/create', [PPIModelAController::class, 'create'])->name('PPI.ModelA.create');
    Route::post('/ppiA/store', [PPIModelAController::class, 'store'])->name('PPI.ModelA.store');
    Route::get('/ppiA/detail/{id}', [PPIModelAController::class, 'detail'])->name('PPI.ModelA.detail');


    /*
    |--------------------------------------------------------------------------
    | Data Diri Guru
    |--------------------------------------------------------------------------
    */
    Route::get('/guru/DataDiri/edit/{user}', [AdministratorController::class, 'editGuruDataDiri'])->name('guru.DataDiri.edit');
    Route::put('/guru/DataDiri/update/{user}', [AdministratorController::class, 'updateGuruDataDiri'])->name('guru.DataDiri.update');
    Route::get('/guru/DataDiri/show/{user}', [AdministratorController::class, 'showGuruDataDiri'])->name('guru.DataDiri.show');
    Route::get('/guru/DataDiri/password/{user}', [AdministratorController::class, 'showResetPasswordGuru'])->name('guru.DataDiri.password');
    Route::post('/guru/DataDiri/password/{user}', [AdministratorController::class, 'resetPasswordGuru'])->name('guru.DataDiri.password');
});
