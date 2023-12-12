<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\CheckoutController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CustomerDashboardController;
use App\Http\Controllers\CustomerProfileController;
use App\Http\Controllers\CustomerTransaksiController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomeUserController;
use App\Http\Controllers\JenisBarangController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\LaporanPenjualanController;
use App\Http\Controllers\LaporanStokBarangController;
use App\Http\Controllers\PengirimanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ValidasiPembayaranController;
use App\Http\Controllers\VerificationController;

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

Route::get('/verification', [VerificationController::class, 'show'])->name('verification.page');
Route::post('/verification', [VerificationController::class, 'verify'])->name('verification.verify');

Route::middleware(['checkAge'])->group(function () {
    Route::middleware('auth')->group(function () {
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

        Route::middleware(['is_customer'])->group(function () {
            Route::put('/keranjang', [KeranjangController::class, 'store'])->name('keranjang.store');
            Route::get('/keranjang', [KeranjangController::class, 'index'])->name('keranjang.index');
            Route::delete('/keranjang/{id}', [KeranjangController::class, 'destroy'])->name('keranjang.destroy');
            Route::delete('/keranjang/{id}/delete', [KeranjangController::class, 'destroyAll'])->name('keranjang.destroyAll');
            Route::put('/keranjang/{id}/update', [KeranjangController::class, 'updateJumlah'])->name('keranjang.updateJumlah');

            Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
            Route::post('/checkout', [CheckoutController::class, 'checkout'])->name('checkout.checkout');

            Route::get('/dahsboard-customer', [CustomerDashboardController::class, 'index'])->name('dashboard-customer.index');

            Route::get('/dashboard-transaksi', [CustomerTransaksiController::class, 'index'])->name('transaksi-customer.index');
            Route::get('/dashboard-transaksi/{id}/show', [CustomerTransaksiController::class, 'show'])->name('transaksi-customer.show');
            Route::put('/dashboard-transaksi/{id}/uplaodBuktiTransfer', [CustomerTransaksiController::class, 'uploadBuktiTransfer'])->name('transaksi-customer.uploadBukti');
            Route::put('/dashboard-transaksi/{id}/ubahBuktiTransfer', [CustomerTransaksiController::class, 'ubahBuktiTransfer'])->name('transaksi-customer.ubahBukti');

            Route::get('/dashboard-profile', [CustomerProfileController::class, 'index'])->name('profil-customer.index');
            Route::put('/dashboard-profile/{id}', [CustomerProfileController::class, 'update'])->name('profil-customer.update');
            Route::put('/dashboard-profile/{id}/password', [CustomerProfileController::class, 'updatePassword'])->name('profil-customer.updatePassword');
        });

        Route::middleware(['is_admin'])->group(function () {
            Route::get('/get-monthly-sales-data', [HomeController::class, 'getMonthlySalesData']);

            Route::resource('/user', UserController::class);

            Route::resource('/customer', CustomerController::class);

            Route::resource('/jenis-barang', JenisBarangController::class);

            Route::resource('/barang', BarangController::class);

            Route::get('/validasi-pembayaran', [ValidasiPembayaranController::class, 'index'])->name('validasi-pembayaran.index');
            Route::put('/validasi-pembayaran/{id}/validasi', [ValidasiPembayaranController::class, 'validasi'])->name('validasi-pembayaran.validasi');

            Route::get('/pengiriman', [PengirimanController::class, 'index'])->name('pengiriman.index');
            Route::get('/pengiriman/{id}/details', [PengirimanController::class, 'show'])->name('pengiriman.show');
            Route::put('/pengiriman/{id}/kirim', [PengirimanController::class, 'send'])->name('pengiriman.send');
            Route::put('/pengiriman/{id}/konfirmasi', [PengirimanController::class, 'konfirmasi'])->name('pengiriman.konfirmasi');

            Route::get('/laporan-penjualan', [LaporanPenjualanController::class, 'index'])->name('laporan-penjualan.index');
            Route::get('/laporan-penjualan/{id}/detail', [LaporanPenjualanController::class, 'show'])->name('laporan-penjualan.show');
            Route::get('/laporan-penjualan/print', [LaporanPenjualanController::class, 'print'])->name('laporan-penjualan.print');
            Route::get('/laporan-penjualan/{id}/print-invoice', [LaporanPenjualanController::class, 'printInvoice'])->name('laporan-penjualan.print-invoice');

            Route::get('/laporan-stok-barang', [LaporanStokBarangController::class, 'index'])->name('laporan-stok-barang.index');
            Route::get('/laporan-stok/print', [LaporanStokBarangController::class, 'print'])->name('laporan-stok.print');

            Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
            Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
            Route::put('/profile/update-password', [ProfileController::class, 'updatePassword'])->name('profile.updatePassword');
        });

    });

    Route::get('/', function () {
        return redirect()->route('home-user.index', 0);
    })->name('landing-page');

    Auth::routes();

    // Frontend Routes

    Route::get('/home-user/{id}', [HomeUserController::class, 'index'])->name('home-user.index');
    Route::get('/detail-barang/{id}', [HomeUserController::class, 'show'])->name('home-user.show');
});


