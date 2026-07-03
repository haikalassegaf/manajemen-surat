<?php

use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PengirimanSuratController;
use App\Http\Controllers\SuratMasukController;
use App\Http\Controllers\SuratKeluarController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VerifSuratMasukController;
use App\Http\Controllers\VerifSuratKeluarController;
use Illuminate\Support\Facades\Session;




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


Route::get('/', [RegisterController::class, 'create']);


Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

Route::get('/register', [RegisterController::class, 'create']);
Route::post('/register', [RegisterController::class, 'register'])->name('register');

Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'login'])->name('login');

// ADMIN //

Route::controller(AdminController::class)->prefix('admin-account')->group(function () {
    Route::get('', 'listAkunAdmin')->name('admin');
    Route::get('edit/{nip}', 'edit')->name('admin.edit');
    Route::post('edit/{nip}', 'update')->name('admin.update');
    Route::delete('delete/{nip}', 'hapus')->name('admin.delete');
});
Route::get('/addadmin', [AdminController::class, 'create']);
Route::post('/addadmin', [AdminController::class, 'addadmin'])->name('addadmin');

Route::controller(PegawaiController::class)->prefix('employee-account')->group(function () {
    Route::get('', 'listAkunPegawai')->name('pegawai');
    Route::get('edit/{nip}', 'edit')->name('pegawai.edit');
    Route::post('edit/{nip}', 'update')->name('pegawai.update');
    Route::delete('delete/{nip}', 'hapus')->name('pegawai.delete');
});
Route::get('/addPegawai', [PegawaiController::class, 'create']);
Route::post('/addPegawai', [PegawaiController::class, 'addPegawai'])->name('addPegawai');

Route::controller(SuratKeluarController::class)->prefix('list-outgoing-mails')->group(function () {
    Route::get('', 'listSuratKeluar')->name('listSuratKeluar');
    Route::get('edit/{no_surat}', 'edit')->name('suratkeluar.edit');
    Route::post('edit/{no_surat}', 'update')->name('suratkeluar.update');
    Route::delete('delete/{no_surat}', 'hapus')->name('suratkeluar.delete');
});
Route::get('/add-outgoing-mail', [SuratKeluarController::class, 'create']);
Route::post('/add-outgoing-mail', [SuratKeluarController::class, 'addSuratKeluar'])->name('addSuratKeluar');

Route::controller(SuratMasukController::class)->prefix('list-incoming-mails')->group(function () {
    Route::get('', 'listSuratMasuk')->name('listSuratMasuk');
    Route::get('edit/{no_surat}', 'edit')->name('suratmasuk.edit');
    Route::post('edit/{no_surat}', 'update')->name('suratmasuk.update');
    Route::delete('delete/{no_surat}', 'hapus')->name('suratmasuk.delete');
});
Route::get('/add-incoming-mail', [SuratMasukController::class, 'create']);
Route::post('/add-incoming-mail', [SuratMasukController::class, 'addSuratMasuk'])->name('addSuratMasuk');

Route::controller(VerifSuratMasukController::class)->prefix('verif-mails')->group(function () {
    Route::get('', 'listVerifSuratMasuk')->name('listVerifSuratMasuk');
    Route::post('verifikasi/{no_surat}', 'verifikasi')->name('suratmasuk.verif');
});


Route::controller(VerifSuratKeluarController::class)->prefix('verif-outgoing-mails')->group(function () {
    Route::get('', 'listVerifSuratKeluar')->name('listVerifSuratKeluar');
    Route::post('verifikasi/{no_surat}', 'verifikasi')->name('suratkeluar.verif');
});

// PEGAWAI //

Route::controller(SuratMasukController::class)->prefix('incoming-mails')->group(function () {
    Route::get('', 'suratMasuk')->name('pegawai.listSuratMasuk');
    Route::get('/add', 'buat')->name('buat.suratmasuk');
    Route::post('/add', 'tambahSuratMasuk')->name('tambahSuratMasuk');
    Route::get('edit/{no_surat}', 'ubah')->name('ubah.SuratMasuk');
    Route::post('edit/{no_surat}', 'simpan')->name('simpan.SuratMasuk');
    Route::delete('delete/{no_surat}', 'delete')->name('pegawai.deletesuratmasuk');
});


Route::controller(SuratKeluarController::class)->prefix('outgoing-mails')->group(function () {
    Route::get('', 'suratKeluar')->name('pegawai.listSuratKeluar');
    Route::get('/add', 'buat')->name('buat.suratkeluar');
    Route::post('/add', 'tambahSuratKeluar')->name('tambahSuratKeluar');
    Route::get('edit/{no_surat}', 'ubah')->name('ubah.SuratKeluar');
    Route::post('edit/{no_surat}', 'simpan')->name('simpan.SuratKeluar');
    Route::delete('delete/{no_surat}', 'delete')->name('pegawai.deletesuratkeluar');
});


Route::controller(PengirimanSuratController::class)->prefix('list-delivery-mails')->group(function () {
    Route::get('', 'listPengirimanSurat')->name('listDeliverySurat');
    Route::get('/add/{no_surat}', 'buat')->name('pengiriman');
    Route::post('/add/{no_surat}', 'tambahPengiriman')->name('tambahPengiriman');
});
// Route::get('/add-delivery-mails/{no_surat}', [PengirimanSuratController::class, 'buat']);
// Route::post('/add-delivery-mails/{no_surat}', [PengirimanSuratController::class, 'tambahPengiriman'])->name('tambahPengiriman');

Route::controller(PengirimanSuratController::class)->prefix('delivery-mails')->group(function () {
    Route::get('', 'pengirimanSurat')->name('deliverySurat');
});
Route::get('/add-delivery-mails/{no_surat}', [PengirimanSuratController::class, 'tambah']);
Route::post('/add-delivery-mails/{no_surat}', [PengirimanSuratController::class, 'buatPengiriman'])->name('buatPengiriman');

// Route::get('add-delivery-mail', function () {
//     return view('admin.addPengirimanSurat');
// });