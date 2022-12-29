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

use App\Http\Controllers\Admin\Permohonan\EditController;

use App\Http\Controllers\Admin\Permohonan\Petugas\AddPetugasPmbController;
use App\Http\Controllers\Admin\Permohonan\Petugas\AddPetugasTdController;
use App\Http\Controllers\Admin\Permohonan\Petugas\AddPetugasIbController;
use App\Http\Controllers\Admin\Permohonan\Petugas\AddPetugasServiceController;
use App\Http\Controllers\Admin\Transaksi\DpController;
use App\Http\Controllers\Admin\DataTugas\DataController;

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

Route::get('payment/success', [KonfirmasiInstalasiBangunan::class, 'midtransCallback']);
Route::post('payment/success', [KonfirmasiInstalasiBangunan::class, 'midtransCallback']);



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

        Route::get('edit_instalasi_baru/{id}', [EditController::class, 'instalasiBangunan'])->name('instalasi.bangunan');
        Route::put('update_instalasi_baru/{id}', [EditController::class, 'instalasiBangunanUpdate'])->name('instalasi.bangunan.update');
        Route::delete('delete_instalasi_baru/{id}', [EditController::class, 'instalasiBaruDelete'])->name('ib.delete');

        Route::get('edit_pasang_meter/{id}', [EditController::class, 'pasangMeter'])->name('pasang.meter');
        Route::put('update_pasang_meter/{id}', [EditController::class, 'pasangMeterUpdate'])->name('pasang.meter.update');
        Route::delete('delete_pmb/{id}', [EditController::class, 'pasangMeterDelete'])->name('pmb.delete');

        Route::get('edit_tambah_daya/{id}', [EditController::class, 'tambahDaya'])->name('tambah.daya');
        Route::put('update_tambah_daya/{id}', [EditController::class, 'tambahDayaUpdate'])->name('tambah.daya.update');
        Route::delete('delete_td/{id}', [EditController::class, 'tambahDayaDelete'])->name('td.delete');

        Route::get('edit_slb/{id}', [EditController::class, 'Slb'])->name('slb');
        Route::put('update_slb/{id}', [EditController::class, 'slbUpdate'])->name('slb.update');
        Route::delete('delete_slb/{id}', [EditController::class, 'slbDelete'])->name('slb.delete');

        Route::get('edit_sml/{id}', [EditController::class, 'Sml'])->name('sml');
        Route::put('update_sml/{id}', [EditController::class,  'smlUpdate'])->name('sml.update');
        Route::delete('delete_sml/{id}', [EditController::class,  'smlDelete'])->name('sml.delete');

        Route::resource('list_permohonan.add_petugas_pmb', AddPetugasPmbController::class)->shallow();
        Route::resource('list_permohonan.add_petugas_td', AddPetugasTdController::class)->shallow();
        Route::resource('list_permohonan.add_petugas_ib', AddPetugasIbController::class)->shallow();
        Route::resource('list_permohonan.add_petugas_service', AddPetugasServiceController::class)->shallow();
        Route::resource('dp', DpController::class);
        Route::resource('data_tugas', DataController::class);

        Route::get('buat/tagihan/pelunasan/{id}', [DataController::class, 'buatTagihanPelunasan'])->name('buat.tagihan');

    });

});



require __DIR__.'/auth.php';
