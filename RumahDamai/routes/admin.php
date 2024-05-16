<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DataAnak\AnakController;
use App\Http\Controllers\Admin\MasterData\KebutuhanDisabilitasController;
use App\Http\Controllers\Admin\DataOrangTuaWali\OrangTuaWaliController;
use App\Http\Controllers\Admin\MasterData\LokasiTugasController;
use App\Http\Controllers\Admin\MasterData\AgamaController;
use App\Http\Controllers\Admin\MasterData\DonasiController;
use App\Http\Controllers\Admin\MasterData\DisabilitasController;
use App\Http\Controllers\Admin\TipeAnak\AnakDisabilitasController;
use App\Http\Controllers\Admin\MasterData\JenisKelaminController;
use App\Http\Controllers\Admin\MasterData\GolonganDarahController;
use App\Http\Controllers\Admin\MasterData\PekerjaanController;
use App\Http\Controllers\Admin\MasterData\PendidikanController;
use App\Http\Controllers\Admin\MasterData\PenyakitController;
use App\Http\Controllers\Admin\MasterData\SponsorshipController;
use App\Http\Controllers\Admin\DataAnak\RiwayatMedisController;
use App\Http\Controllers\Admin\MasterData\KategoriBeritaController;
use App\Http\Controllers\Admin\Pendidikan\MingguPembelajaranController;
use App\Http\Controllers\Admin\Pendidikan\SemesterTahunAjaranController;
use App\Http\Controllers\Admin\Pendidikan\TahunKurikulumController;
use App\Http\Controllers\Admin\TipeAnak\AnakNonDisabilitasController;
use App\Http\Controllers\Admin\Pendidikan\KelasController;
use App\Http\Controllers\Admin\Visitor\AboutController;
use App\Http\Controllers\Admin\Visitor\BeritaController;
use App\Http\Controllers\Admin\Visitor\CarouselController;
use App\Http\Controllers\Admin\Visitor\FasilitasController;
use App\Http\Controllers\Admin\Visitor\GaleriController;
use App\Http\Controllers\Admin\Visitor\HistoryController;
use App\Http\Controllers\Admin\Visitor\ProgramController;
use App\Http\Controllers\Admin\Pendidikan\TahunAjaranController;
use App\Http\Controllers\Admin\Administrator\AdministratorController;
use App\Http\Controllers\Admin\Pengumuman\PengumumanController;



Route::middleware(['auth', 'user-access:admin'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Data Anak
    |--------------------------------------------------------------------------
    */
    Route::resource('/DataAnak/anak', AnakController::class);
    Route::patch('/anak/{id}/aktifkan', [AnakController::class, 'aktifkan'])->name('anak.aktifkan');
    Route::patch('/anak/nonaktifkan/{id}', [AnakController::class, 'nonaktifkan'])->name('anak.nonaktifkan');
    Route::resource('/DataOrangTuaWali/orangTuaWali', OrangTuaWaliController::class);
    Route::resource('/DataAnak/riwayatMedis', RiwayatMedisController::class);
    Route::get('/anak/{id}/pdf', [AnakController::class, 'generatePDF'])->name('anak.pdf');
    Route::get('/anak/export/excel', [AnakController::class, 'exportExcel'])->name('anak.export.excel');




    /*
    |--------------------------------------------------------------------------
    | Master Data
    |--------------------------------------------------------------------------
    */
    Route::resource('/masterdata/agama', AgamaController::class);
    Route::resource('/masterdata/jenisKelamin', JenisKelaminController::class);
    Route::resource('/masterdata/golonganDarah', GolonganDarahController::class);
    Route::resource('/masterdata/kebutuhanDisabilitas', KebutuhanDisabilitasController::class);
    Route::resource('/masterdata/lokasiTugas', LokasiTugasController::class);
    Route::resource('/masterdata/pendidikan', PendidikanController::class);
    Route::resource('/masterdata/pekerjaan', PekerjaanController::class);
    Route::resource('/masterdata/sponsorship', SponsorshipController::class);
    Route::resource('/masterdata/disabilitas', DisabilitasController::class);
    Route::resource('/masterdata/donasi', DonasiController::class);
    Route::resource('/masterdata/penyakit', PenyakitController::class);
    Route::resource('/masterdata/kategoriBerita', KategoriBeritaController::class);
    Route::resource('/masterdata/penyakit', PenyakitController::class);


    /*
    |--------------------------------------------------------------------------
    | Disabilitas dan Non-Disabilitas
    |--------------------------------------------------------------------------
    */
    Route::resource('/TipeAnak/anakDisabilitas', AnakDisabilitasController::class);
    Route::resource('/TipeAnak/anakNonDisabilitas', AnakNonDisabilitasController::class);


    /*
    |--------------------------------------------------------------------------
    | Pendidikan
    |--------------------------------------------------------------------------
    */
    Route::resource('/pendidikan/tahunKurikulum', TahunKurikulumController::class);
    Route::resource('/pendidikan/kelas', KelasController::class);
    Route::resource('/pendidikan/tahunAjaran', TahunAjaranController::class);
    Route::resource('/pendidikan/semesterTahunAjaran', SemesterTahunAjaranController::class);
    Route::resource('/pendidikan/mingguPembelajaran', MingguPembelajaranController::class);


    /*
    |--------------------------------------------------------------------------
    | Pengumuman
    |--------------------------------------------------------------------------
    */
    Route::get('/pengumuman/create', [PengumumanController::class, 'create'])->name('pengumuman.create');
    Route::post('pengumuman', [PengumumanController::class, 'store'])->name('pengumuman.store');
    Route::get('pengumuman/{id}/edit', [PengumumanController::class, 'edit'])->name('pengumuman.edit');
    Route::put('pengumuman/{id}', [PengumumanController::class, 'update'])->name('pengumuman.update');
    Route::delete('pengumuman/{id}', [PengumumanController::class, 'destroy'])->name('pengumuman.destroy');


    /*
    |--------------------------------------------------------------------------
    | Users
    |--------------------------------------------------------------------------
    */
    Route::get('/administrator/all', [AdministratorController::class, 'all'])->name('admin.administrator.all');
    Route::get('/administrator/admin', [AdministratorController::class, 'admin'])->name('admin.administrator.admin');
    Route::get('/administrator/guru', [AdministratorController::class, 'guru'])->name('admin.administrator.guru');
    Route::get('/administrator/staff', [AdministratorController::class, 'staff'])->name('admin.administrator.staff');
    Route::get('/administrator/direktur', [AdministratorController::class, 'direktur'])->name('admin.administrator.direktur');
    Route::get('/administrator/create', [AdministratorController::class, 'create'])->name('admin.administrator.create');
    Route::get('/administrator/{id}', [AdministratorController::class, 'show'])->name('admin.administrator.show');
    Route::post('/administrator/store', [AdministratorController::class, 'store'])->name('admin.administrator.store');
    Route::get('/administrator/{user}/edit', [AdministratorController::class, 'edit'])->name('admin.administrator.edit');
    Route::put('/administrator/{user}/update', [AdministratorController::class, 'update'])->name('admin.administrator.update');
    Route::delete('/administrator/{user}/destroy', [AdministratorController::class, 'destroy'])->name('admin.administrator.destroy');
    Route::get('/administrator/{id}/pdf', [AdministratorController::class, 'generatePDF'])->name('user.pdf');
    Route::get('/administrator/export/excel', [AdministratorController::class, 'export_excel'])->name('export.excel');


    /*
    |--------------------------------------------------------------------------
    | Status Admin
    |--------------------------------------------------------------------------
    */
    Route::post('/admin/nonaktifkan/admin/{id}', [AdministratorController::class, 'nonaktifkanAdmin'])->name('admin.nonaktifkan.admin');
    Route::post('/admin/aktifkan/admin/{id}', [AdministratorController::class, 'aktifkanAdmin'])->name('admin.aktifkan.admin');


    /*
    |--------------------------------------------------------------------------
    | Status Guru
    |--------------------------------------------------------------------------
    */
    Route::post('/admin/nonaktifkan/guru/{id}', [AdministratorController::class, 'nonaktifkanGuru'])->name('admin.nonaktifkan.guru');
    Route::post('/admin/aktifkan/guru/{id}', [AdministratorController::class, 'aktifkanGuru'])->name('admin.aktifkan.guru');


    /*
    |--------------------------------------------------------------------------
    | Status Staff
    |--------------------------------------------------------------------------
    */
    Route::post('/admin/nonaktifkan/staff/{id}', [AdministratorController::class, 'nonaktifkanStaff'])->name('admin.nonaktifkan.staff');
    Route::post('/admin/aktifkan/staff/{id}', [AdministratorController::class, 'aktifkanStaff'])->name('admin.aktifkan.staff');


    /*
    |--------------------------------------------------------------------------
    | Status Direktur
    |--------------------------------------------------------------------------
    */
    Route::post('/admin/nonaktifkan/direktur/{id}', [AdministratorController::class, 'nonaktifkanDirektur'])->name('admin.nonaktifkan.direktur');
    Route::post('/admin/aktifkan/direktur/{id}', [AdministratorController::class, 'aktifkanDirektur'])->name('admin.aktifkan.direktur');


    /*
    |--------------------------------------------------------------------------
    | Raport
    |--------------------------------------------------------------------------
    */
    /* Raport Demo */
    /*     Route::resource('/raport', RaportController::class); Route::get('raport/{id}/pdf', 'App\Http\Controllers\Raport\RaportController@pdf')->name('raport.pdf'); */
    Route::delete('/galeri/delete-image/{id}', [GaleriController::class, 'deleteImage'])->name('galeri.deleteImage');
    Route::delete('/faslitas/delete-image/{id}', [FasilitasController::class, 'deleteImage'])->name('fasilitas.deleteImage');


    /*
    |--------------------------------------------------------------------------
    | Visitor
    |--------------------------------------------------------------------------
    */
    Route::resource('carousel', CarouselController::class);
    Route::resource('history', HistoryController::class);
    Route::resource('about', AboutController::class);
    Route::resource('program', ProgramController::class);
    Route::resource('berita', BeritaController::class);
    Route::resource('fasilitas', FasilitasController::class);
    Route::resource('galeri', GaleriController::class);
});
