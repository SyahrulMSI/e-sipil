<?php


use App\Http\Controllers\LandingController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Customer\DashboardController;

use App\Http\Controllers\Customer\Layanan\InstalasiBangunanBaruController;
use App\Http\Controllers\Customer\Layanan\PasangMeterBaruController;
use App\Http\Controllers\Customer\Layanan\ServiceListrikBangunanController;
use App\Http\Controllers\Customer\Layanan\ServiceMeterListrikController;
use App\Http\Controllers\Customer\Layanan\TambahDayaListrikController;
use App\Http\Controllers\Customer\Permohonan\DaftarPermohonanController;
use App\Http\Controllers\Customer\Pemasangan\AgendaController;
use App\Http\Controllers\Customer\Pemasangan\HistoryController;
use App\Http\Controllers\Customer\Transaksi\DpController;
use App\Http\Controllers\Customer\Transaksi\PelunasanController;
use App\Http\Controllers\Customer\Profile\ProfileController;
use App\Http\Controllers\Customer\Profile\DetailProfileController;
use App\Http\Controllers\Api\MidtransController;
use App\Http\Controllers\Customer\Progres\ProgresController;
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

Route::resource('/', LandingController::class);

Route::group(['prefix' => 'customer', 'as' => 'customer.'], function () {
    Route::middleware(['auth', 'verified'])->group(function(){

        Route::resource('dashboard', DashboardController::class);

        Route::resource('instalasi_bangunan_baru', InstalasiBangunanBaruController::class);
        Route::resource('pasang_meter_baru', PasangMeterBaruController::class);
        Route::resource('service_listrik_bangunan', ServiceListrikBangunanController::class);
        Route::resource('service_meter_listrik', ServiceMeterListrikController::class);
        Route::resource('tambah_daya_listrik', TambahDayaListrikController::class);

        Route::resource('daftar_permohonan', DaftarPermohonanController::class);

        Route::resource('agenda_pemasangan', AgendaController::class);
        Route::resource('history', HistoryController::class);

        Route::resource('transaksi_dp', DpController::class);
        Route::resource('transaksi_pelunasan', PelunasanController::class);

        Route::resource('my_profile', ProfileController::class);
        Route::resource('detail_profile', DetailProfileController::class);

        Route::resource('progress', ProgresController::class);

    });

    Route::get('payment/success', [KonfirmasiInstalasiBangunan::class, 'midtransCallback']);
    Route::post('payment/success', [KonfirmasiInstalasiBangunan::class, 'midtransCallback']);

    Route::get('payment/success', [KonfirmasiPasangMeterController::class, 'midtransCallback']);
    Route::post('payment/success', [KonfirmasiPasangMeterController::class, 'midtransCallback']);

    Route::get('payment/success', [KonfirmasiServiceListrikBangunanController::class, 'midtransCallback']);
    Route::post('payment/success', [KonfirmasiServiceListrikBangunanController::class, 'midtransCallback']);

    Route::get('payment/success', [KonfirmasiServiceMeterListrik::class, 'midtransCallback']);
    Route::post('payment/success', [KonfirmasiServiceMeterListrik::class, 'midtransCallback']);

    Route::get('payment/success', [KonfirmasiTambahDayaController::class, 'midtransCallback']);
    Route::post('payment/success', [KonfirmasiTambahDayaController::class, 'midtransCallback']);

});




require __DIR__.'/auth.php';
