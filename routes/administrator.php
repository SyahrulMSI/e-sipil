<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\DashboardController;
use GuzzleHttp\Middleware;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

use App\Http\Controllers\Admin\DataPelangganController;
use App\Http\Controllers\Admin\Pemasangan\AccProyekController;
use App\Http\Controllers\Admin\Pemasangan\AgendaPemasanganController;
use App\Http\Controllers\Admin\Pemasangan\ListProyekController;
use App\Http\Controllers\Admin\Pemasangan\LokasiPemasanganController;
use App\Http\Controllers\Admin\Permohonan\CetakPermohonanController;
use App\Http\Controllers\Admin\Permohonan\DpPemohonController;
use App\Http\Controllers\Admin\Permohonan\ListPermohonanController;
use App\Http\Controllers\Admin\Profile\DetailUserController;
use App\Http\Controllers\Admin\Transaksi\CetakinvoiceController;
use App\Http\Controllers\Admin\Transaksi\PelunasanController;

use App\Http\Controllers\Admin\User\Admin\AdminController;
use App\Http\Controllers\Admin\User\Customer\CustomerController;
use App\Http\Controllers\Admin\User\Petugas\PetugasController;

use App\Http\Controllers\Admin\Profile\ProfileController;
use App\Http\Controllers\Admin\Profile\DetailProfileController;

use App\Http\Controllers\Admin\Konfirmasi\KonfirmasiPasangMeterController;
use App\Http\Controllers\Admin\Konfirmasi\KonfirmasiInstalasiBangunan;
use App\Http\Controllers\Admin\Konfirmasi\KonfirmasiServiceListrikBangunanController;
use App\Http\Controllers\Admin\Konfirmasi\KonfirmasiTambahDayaController;
use App\Http\Controllers\Admin\Konfirmasi\KonfirmasiServiceMeterListrikController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {

    Route::middleware(['auth', 'verified'])->group(function(){

        Route::resource('dashboard', DashboardController::class);
        Route::resource('data_pelanggan', DataPelangganController::class);

        Route::resource('agenda_pemasangan', AgendaPemasanganController::class);
        Route::resource('lokasi_pemasangan', LokasiPemasanganController::class);
        Route::resource('list_proyek', ListProyekController::class);
        Route::resource('acc_proyek', AccProyekController::class);

        Route::resource('list_permohonan', ListPermohonanController::class);
        Route::resource('cetak_permohonan', CetakPermohonanController::class);
        Route::resource('dp_pemohon', DpPemohonController::class);

        Route::resource('invoice', CetakinvoiceController::class);
        Route::resource('pelunasan', PelunasanController::class);

        Route::resource('administrator', AdminController::class);
        Route::resource('petugas', PetugasController::class);
        Route::resource('customer', CustomerController::class);

        Route::resource('my_profile', ProfileController::class);
        Route::resource('detail_profile', DetailProfileController::class);

        Route::resource('list_permohonan.k_pasang_meter', KonfirmasiPasangMeterController::class)->shallow();
        Route::resource('list_permohonan.k_instalasi_bangunan', KonfirmasiInstalasiBangunan::class)->shallow();
        Route::resource('list_permohonan.k_service_listrik_bangunan', KonfirmasiServiceListrikBangunanController::class)->shallow();
        Route::resource('list_permohonan.k_tambah_daya', KonfirmasiTambahDayaController::class)->shallow();
        Route::resource('list_permohonan.k_service_meter_listrik', KonfirmasiServiceMeterListrikController::class)->shallow();


    });

});



require __DIR__.'/auth.php';
