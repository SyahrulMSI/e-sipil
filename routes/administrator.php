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
use App\Http\Controllers\Admin\Transaksi\CetakinvoiceController;
use App\Http\Controllers\Admin\Transaksi\PelunasanController;

use App\Http\Controllers\Admin\User\Admin\AdminController;
use App\Http\Controllers\Admin\User\Customer\CustomerController;
use App\Http\Controllers\Admin\User\Petugas\PetugasController;

use App\Http\Controllers\Admin\Profile\ProfileController;

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

    });

});



require __DIR__.'/auth.php';
