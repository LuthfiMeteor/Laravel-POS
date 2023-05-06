<?php

use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfoUserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\SessionsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Route;

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

    Route::get('/', [HomeController::class, 'home']);
	Route::get('dashboard', function () {
		return view('dashboard');
	})->name('dashboard');

	Route::get('produk', function () {
		return view('billing');
	})->name('produk');

	Route::get('kategori', function () {
		return view('kategori');
	})->name('kategori');

	Route::get('member', function () {
		return view('member');
	})->name('member');

	Route::get('user-management', function () {
		return view('laravel-examples/user-management');
	})->name('user-management');

	Route::get('supplier', function () {
		return view('supplier');
	})->name('supplier');

    Route::get('pengeluaran', function () {
		return view('pengeluaran');
	})->name('pengeluaran');

    Route::get('pembelian', function () {
		return view('pembelian');
	})->name('pembelian');

    Route::get('penjualan', function () {
		return view('penjualan');
	})->name('penjualan');
	Route::get('transaksi-aktif', function () {
		return view('transaksi-aktif');
	})->name('transaksi-aktif');
	Route::get('transaksi-baru', function () {
		return view('transaksi-baru');
	})->name('transaksi-baru');

	Route::get('laporan', function () {
		return view('laporan');
	})->name('laporan');

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