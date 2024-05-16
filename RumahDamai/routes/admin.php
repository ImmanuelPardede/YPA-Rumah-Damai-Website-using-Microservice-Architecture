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
    Route::get('/admin/masterdata/agama', [AgamaController::class, 'index'])->name('admin.masterdata.agama.index');
    Route::post('/admin/masterdata/agama', [AgamaController::class, 'store'])->name('agama.store');
    Route::get('/admin/masterdata/agama/{id}/edit', [AgamaController::class, 'edit'])->name('admin.masterdata.agama.edit');
    Route::put('/admin/masterdata/agama/{id}', [AgamaController::class, 'update'])->name('admin.masterdata.agama.update');
    Route::delete('/admin/masterdata/agama/{id}', [AgamaController::class, 'destroy'])->name('admin.masterdata.agama.destroy');


    Route::resource('/masterdata/jenisKelamin', JenisKelaminController::class);
    Route::get('/admin/masterdata/jenisKelamin', [JenisKelaminController::class, 'index'])->name('admin.masterdata.jenisKelamin.index');
    Route::post('/admin/masterdata/jenisKelamin', [JenisKelaminController::class, 'store'])->name('jenisKelamin.store');
        Route::get('/admin/masterdata/jenisKelamin/{id}/edit', [JenisKelaminController::class, 'edit'])->name('admin.masterdata.jenisKelamin.edit');
    Route::put('/admin/masterdata/jenisKelamin/{id}', [JenisKelaminController::class, 'update'])->name('admin.masterdata.jenisKelamin.update');
    Route::delete('/admin/masterdata/jenisKelamin/{id}', [JenisKelaminController::class, 'destroy'])->name('admin.masterdata.jenisKelamin.destroy');


    Route::resource('/masterdata/golonganDarah', GolonganDarahController::class);
    Route::get('/admin/masterdata/golonganDarah', [GolonganDarahController::class, 'index'])->name('admin.masterdata.golonganDarah.index');
    Route::post('/admin/masterdata/golonganDarah', [GolonganDarahController::class, 'store'])->name('golonganDarah.store');
    Route::get('/admin/masterdata/golonganDarah/{id}/edit', [GolonganDarahController::class, 'edit'])->name('admin.masterdata.golonganDarah.edit');
    Route::put('/admin/masterdata/golonganDarah/{id}', [GolonganDarahController::class, 'update'])->name('admin.masterdata.golonganDarah.update');
    Route::delete('/admin/masterdata/golonganDarah/{id}', [GolonganDarahController::class, 'destroy'])->name('admin.masterdata.golonganDarah.destroy');


    Route::resource('/masterdata/kebutuhanDisabilitas', KebutuhanDisabilitasController::class);

    Route::resource('/masterdata/lokasiTugas', LokasiTugasController::class);

    Route::resource('/masterdata/pendidikan', PendidikanController::class);
    Route::get('/admin/masterdata/pendidikan', [PendidikanController::class, 'index'])->name('admin.masterdata.pendidikan.index');
    Route::post('/admin/masterdata/pendidikan', [PendidikanController::class, 'store'])->name('pendidikan.store');
    Route::get('/admin/masterdata/pendidikan/{id}/edit', [PendidikanController::class, 'edit'])->name('admin.masterdata.pendidikan.edit');
    Route::put('/admin/masterdata/pendidikan/{id}', [PendidikanController::class, 'update'])->name('admin.masterdata.pendidikan.update');
    Route::delete('/admin/masterdata/pendidikan/{id}', [PendidikanController::class, 'destroy'])->name('admin.masterdata.pendidikan.destroy');


    Route::resource('/masterdata/pekerjaan', PekerjaanController::class);
    Route::get('/admin/masterdata/pekerjaan', [PekerjaanController::class, 'index'])->name('admin.masterdata.pekerjaan.index');
    Route::post('/admin/masterdata/pekerjaan', [PekerjaanController::class, 'store'])->name('pekerjaan.store');
    Route::get('/admin/masterdata/pekerjaan/{id}/edit', [PekerjaanController::class, 'edit'])->name('admin.masterdata.pekerjaan.edit');
    Route::put('/admin/masterdata/pekerjaan/{id}', [PekerjaanController::class, 'update'])->name('admin.masterdata.pekerjaan.update');
    Route::delete('/admin/masterdata/pekerjaan/{id}', [PekerjaanController::class, 'destroy'])->name('admin.masterdata.pekerjaan.destroy');


    Route::resource('/masterdata/sponsorship', SponsorshipController::class);
    Route::get('/admin/masterdata/sponsorship', [SponsorshipController::class, 'index'])->name('admin.masterdata.sponsorship.index');
    Route::post('/admin/masterdata/sponsorship', [SponsorshipController::class, 'store'])->name('sponsorship.store');
    Route::get('/admin/masterdata/sponsorship/{id}/edit', [SponsorshipController::class, 'edit'])->name('admin.masterdata.sponsorship.edit');
    Route::put('/admin/masterdata/sponsorship/{id}', [SponsorshipController::class, 'update'])->name('admin.masterdata.sponsorship.update');
    Route::delete('/admin/masterdata/sponsorship/{id}', [SponsorshipController::class, 'destroy'])->name('admin.masterdata.sponsorship.destroy');


    Route::resource('/masterdata/disabilitas', DisabilitasController::class);
    Route::get('/admin/masterdata/disabilitas', [DisabilitasController::class, 'index'])->name('admin.masterdata.disabilitas.index');
    Route::post('/admin/masterdata/disabilitas', [DisabilitasController::class, 'store'])->name('disabilitas.store');
    Route::get('/admin/masterdata/disabilitas/{id}/edit', [DisabilitasController::class, 'edit'])->name('admin.masterdata.disabilitas.edit');
    Route::put('/admin/masterdata/disabilitas/{id}', [DisabilitasController::class, 'update'])->name('admin.masterdata.disabilitas.update');
    Route::delete('/admin/masterdata/disabilitas/{id}', [DisabilitasController::class, 'destroy'])->name('admin.masterdata.disabilitas.destroy');


    Route::resource('/masterdata/donasi', DonasiController::class);
    Route::get('/admin/masterdata/donasi', [DonasiController::class, 'index'])->name('admin.masterdata.donasi.index');
    Route::post('/admin/masterdata/donasi', [DonasiController::class, 'store'])->name('donasi.store');
    Route::get('/admin/masterdata/donasi/{id}/edit', [DonasiController::class, 'edit'])->name('admin.masterdata.donasi.edit');
    Route::put('/admin/masterdata/donasi/{id}', [DonasiController::class, 'update'])->name('admin.masterdata.donasi.update');
    Route::delete('/admin/masterdata/donasi/{id}', [DonasiController::class, 'destroy'])->name('admin.masterdata.donasi.destroy');


    Route::resource('/masterdata/kategoriBerita', KategoriBeritaController::class);


    Route::resource('/masterdata/penyakit', PenyakitController::class);
    Route::get('/admin/masterdata/penyakit', [PenyakitController::class, 'index'])->name('admin.masterdata.penyakit.index');
    Route::post('/admin/masterdata/penyakit', [PenyakitController::class, 'store'])->name('penyakit.store');
    Route::get('/admin/masterdata/penyakit/{id}/edit', [PenyakitController::class, 'edit'])->name('admin.masterdata.penyakit.edit');
    Route::put('/admin/masterdata/penyakit/{id}', [PenyakitController::class, 'update'])->name('admin.masterdata.penyakit.update');
    Route::delete('/admin/masterdata/penyakit/{id}', [PenyakitController::class, 'destroy'])->name('admin.masterdata.penyakit.destroy');


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
    Route::get('/admin/pendidikan/tahunAjaran', [TahunAjaranController::class, 'index'])->name('admin.pendidikan.tahunAjaran.index');
    Route::post('/admin/pendidikan/tahunAjaran', [TahunAjaranController::class, 'store'])->name('tahunAjaran.store');
    Route::get('/admin/pendidikan/tahunAjaran/{id}/edit', [TahunAjaranController::class, 'edit'])->name('admin.pendidikan.tahunAjaran.edit');
    Route::put('/admin/pendidikan/tahunAjaran/{id}', [TahunAjaranController::class, 'update'])->name('admin.pendidikan.tahunAjaran.update');
    Route::delete('/admin/pendidikan/tahunAjaran/{id}', [TahunAjaranController::class, 'destroy'])->name('admin.pendidikan.tahunAjaran.destroy');



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
