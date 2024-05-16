<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Administrator\AdministratorController;



Route::middleware(['auth', 'user-access:direktur'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Data Diri Direktur
    |--------------------------------------------------------------------------
    */
    Route::get('/direktur/DataDiri/edit/{user}', [AdministratorController::class, 'editDirekturDataDiri'])->name('direktur.DataDiri.edit');
    Route::put('/direktur/DataDiri/update/{user}', [AdministratorController::class, 'updateDirekturDataDiri'])->name('direktur.DataDiri.update');
    Route::get('/direktur/DataDiri/show/{user}', [AdministratorController::class, 'showDirekturDataDiri'])->name('direktur.DataDiri.show');
    Route::get('/direktur/DataDiri/password/{user}', [AdministratorController::class, 'showResetPasswordStaff'])->name('direktur.DataDiri.password');
    Route::post('/direktur/DataDiri/password/{user}', [AdministratorController::class, 'resetPasswordStaff'])->name('direktur.DataDiri.password');
});
