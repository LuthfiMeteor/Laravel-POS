<?php

use Illuminate\Http\Request;
use App\Models\Pembeliandetail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Password;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\InfoUserController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\PembeliandetailController;
use App\Http\Controllers\PenjualanDetailController;

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


Route::group(['middleware' => 'auth'], function () {

	Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

	Route::get('/produk/data', [ProdukController::class, 'data'])->name('produk.data');
	Route::post('/produk/delete-selected', [ProdukController::class, 'deleteSelected'])->name('produk.delete_selected');
	Route::post('/produk/cetak-barcode', [ProdukController::class, 'cetakBarcode'])->name('produk.cetak_barcode');
	Route::resource('/produk', ProdukController::class);

	// KATEGORI
	Route::get('kategori/data', [KategoriController::class, 'data'])->name('kategori.data');
	route::get('edit-kategori/{id}', [KategoriController::class, 'edit']);
	Route::put('edit-kategori/proses/{id}', [KategoriController::class, 'update']);
	route::resource('/kategori', KategoriController::class);


	Route::get('/member/data', [MemberController::class, 'data'])->name('member.data');
	Route::post('/member/cetak-member', [MemberController::class, 'cetakMember'])->name('member.cetak_member');
	Route::resource('/member', MemberController::class);

	Route::get('/user/data', [UserController::class, 'data'])->name('user.data');
	Route::resource('/user', UserController::class);

	Route::get('/supplier/data', [SupplierController::class, 'data'])->name('supplier.data');
	Route::resource('/supplier', SupplierController::class);

	Route::get('/setting', [SettingController::class, 'index'])->name('setting.index');
	Route::get('/setting/first', [SettingController::class, 'show'])->name('setting.show');
	Route::post('/setting', [SettingController::class, 'update'])->name('setting.update');

	Route::get('/pengeluaran/data', [PengeluaranController::class, 'data'])->name('pengeluaran.data');
	Route::resource('/pengeluaran', PengeluaranController::class);


	Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
	Route::get('/laporan/data/{awal}/{akhir}', [LaporanController::class, 'data'])->name('laporan.data');
	Route::get('/laporan/pdf/{awal}/{akhir}', [LaporanController::class, 'exportPDF'])->name('laporan.export_pdf');

	Route::get('/pembelian/data', [PembelianController::class, 'data'])->name('pembelian.data');
	Route::get('/pembelian/{id}/create', [PembelianController::class, 'create'])->name('pembelian.create');
	Route::resource('/pembelian', PembelianController::class)
		->except('create');

	Route::get('/pembelian_detail/{id}/data', [PembeliandetailController::class, 'data'])->name('pembelian_detail.data');
	Route::get('/pembelian_detail/loadform/{diskon}/{total}', [PembeliandetailController::class, 'loadForm'])->name('pembelian_detail.load_form');
	Route::resource('/pembelian_detail', PembeliandetailController::class)
		->except('create', 'show', 'edit');

	Route::get('/penjualan/data', [PenjualanController::class, 'data'])->name('penjualan.data');
	Route::get('/penjualan', [PenjualanController::class, 'index'])->name('penjualan.index');
	Route::get('/penjualan/{id}', [PenjualanController::class, 'show'])->name('penjualan.show');
	Route::delete('/penjualan/{id}', [PenjualanController::class, 'destroy'])->name('penjualan.destroy');
	Route::get('/transaksi/baru', [PenjualanController::class, 'create'])->name('transaksi.baru');


	Route::post('/transaksi/simpan', [PenjualanController::class, 'store'])->name('transaksi.simpan');
	Route::get('/transaksi/selesai', [PenjualanController::class, 'selesai'])->name('transaksi.selesai');
	Route::get('/transaksi/nota-kecil', [PenjualanController::class, 'notaKecil'])->name('transaksi.nota_kecil');
	Route::get('/transaksi/nota-besar', [PenjualanController::class, 'notaBesar'])->name('transaksi.nota_besar');

	Route::get('/transaksi/{id}/data', [PenjualanDetailController::class, 'data'])->name('transaksi.data');
	Route::get('/transaksi/loadform/{diskon}/{total}/{diterima}', [PenjualanDetailController::class, 'loadForm'])->name('transaksi.load_form');
	Route::resource('/transaksi', PenjualanDetailController::class)
		->except('create', 'show', 'edit');



	Route::get('/logout', [SessionsController::class, 'destroy']);
	Route::get('/user-profile', [InfoUserController::class, 'create']);
	Route::post('/user-profile', [InfoUserController::class, 'store']);
	Route::get('/login', function () {
		return view('dashboard');
	})->name('sign-up');
});



Route::group(['middleware' => 'guest'], function () {
	Route::get('/login', [SessionsController::class, 'create']);
	Route::post('/session', [SessionsController::class, 'store']);
	Route::get('/login/forgot-password', [ResetController::class, 'create']);
	Route::post('/forgot-password', [ResetController::class, 'sendEmail']);
	Route::get('/reset-password/{token}', [ResetController::class, 'resetPass'])->name('password.reset');
	Route::post('/reset-password', [ChangePasswordController::class, 'changePassword'])->name('password.update');
});

Route::get('/login', function () {
	return view('session/login-session');
})->name('login');
