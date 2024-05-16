<?php

use App\Http\Controllers\Staff\DataSponsor\SponsorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Staff\DataDonatur\DonaturController;
use App\Http\Controllers\Admin\Administrator\AdministratorController;



Route::middleware(['auth', 'user-access:staff'])->group(function () {
    /*
    |--------------------------------------------------------------------------
    | Donatur
    |--------------------------------------------------------------------------
    */
    Route::resource('/DataDonatur/dataDonatur', DonaturController::class);


    /*
    |--------------------------------------------------------------------------
    | Sponsors
    |--------------------------------------------------------------------------
    */
    Route::resource('/DataSponsor/dataSponsor', SponsorController::class);


    /*
    |--------------------------------------------------------------------------
    | Data Diri Staff
    |--------------------------------------------------------------------------
    */
    Route::get('/staff/DataDiri/edit/{user}', [AdministratorController::class, 'editStaffDataDiri'])->name('staff.DataDiri.edit');
    Route::put('/staff/DataDiri/update/{user}', [AdministratorController::class, 'updateStaffDataDiri'])->name('staff.DataDiri.update');
    Route::get('/staff/DataDiri/show/{user}', [AdministratorController::class, 'showStaffDataDiri'])->name('staff.DataDiri.show');
    Route::get('/staff/DataDiri/password/{user}', [AdministratorController::class, 'showResetPasswordStaff'])->name('staff.DataDiri.password');
    Route::post('/staff/DataDiri/password/{user}', [AdministratorController::class, 'resetPasswordStaff'])->name('staff.DataDiri.password');
});
