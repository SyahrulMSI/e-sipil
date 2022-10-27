<?php

use App\Http\Controllers\LandingController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Customer\DashboardController;

use App\Http\Controllers\Customer\Layanan\InstalasiBangunanBaruController;
use App\Http\Controllers\Customer\Layanan\PasangMeterBaruController;
use App\Http\Controllers\Customer\Layanan\ServiceListrikBangunanController;
use App\Http\Controllers\Customer\Layanan\ServiceMeterListrikController;
use App\Http\Controllers\Customer\Layanan\TambahDayaListrikController;


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

    });
});


require __DIR__.'/auth.php';
