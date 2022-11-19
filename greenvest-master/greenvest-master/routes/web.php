<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PortofolioController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ProfileController;


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

Route::get('/', function () {
    return view('index', ['title' => 'Home']);
});

/* login page */
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
/* register page */
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

/* Route::get('/home', [homeController::class, 'index'])->middleware('auth', 'User')->name('home'); */

/* Resource */
Route::resource('user', UserController::class)->middleware('auth', 'user', 'admin', 'subadmin');
/* Route::resource('developer', DeveloperController::class)->middleware('auth', 'developer'); */

Route::get('dashboard-saldo', [DashboardController::class, 'dashboard_saldo'])->middleware('auth', 'user')->name('dashboard.saldo');
Route::get('dashboard-keuntungan', [DashboardController::class, 'dashboard_keuntungan'])->middleware('auth', 'user')->name('dashboard.keuntungan');
Route::get('dashboard-total_bayar', [DashboardController::class, 'dashboard_total_bayar'])->middleware('auth', 'user')->name('dashboard.total_bayar');

/* dummy bankdef - user dashboard */
Route::post('bankdef/{id}', [UserController::class, 'bankdefupdate'])->name('bankdef.bankdefupdate');
Route::get('bank', [UserController::class, 'bank'])->middleware('auth', 'user')->name('bank');
Route::get('bank create', [UserController::class, 'create_bank'])->middleware('auth', 'user')->name('bank.create');
Route::post('bank store', [UserController::class, 'store_bank'])->middleware('auth', 'user')->name('bank.store');
Route::get('bank edit/{id}', [UserController::class, 'edit_bank'])->middleware('auth', 'user')->name('bank.edit');
Route::post('bank update', [UserController::class, 'update_bank'])->middleware('auth', 'user')->name('bank.update');
Route::delete('bank delete/{id}', [UserController::class, 'delete_bank'])->middleware('auth', 'user')->name('bank.delete');

/* Route::get('dashboard', [DashboardController::class, 'index'])->middleware('auth', 'user')->name('dashboard'); */
/* Portofolio */
Route::get('portofolio', [PortofolioController::class, 'index'])->middleware('auth', 'user')->name('portofolio');
Route::get('portofolio detail/{id}', [PortofolioController::class, 'portofolio_detail'])->middleware('auth', 'user')->name('portofolio.detail');
Route::post('portofolio jual', [PortofolioController::class, 'portofolio_jual'])->name('portofolio.jual');

Route::get('profile', [ProfileController::class, 'index'])->middleware('auth', 'user')->name('profile');
Route::post('profile', [ProfileController::class, 'update'])->middleware('auth', 'user')->name('profile.update');
/* Transaksi */
Route::get('transaksi green-bond', [TransaksiController::class, 'greenbond'])->middleware('auth', 'user')->name('transaksi.greenbond');
Route::get('transaksi green-sukuk', [TransaksiController::class, 'greensukuk'])->middleware('auth', 'user')->name('transaksi.greensukuk');
Route::get('transaksi green-taxonomy', [TransaksiController::class, 'greentaxonomy'])->middleware('auth', 'user')->name('transaksi.greentaxonomy');
Route::get('transaksi list-transaksi', [TransaksiController::class, 'listtransaksi'])->middleware('auth', 'user')->name('transaksi.list');
Route::get('transaksi detail/{id}', [TransaksiController::class, 'transaksi_detail'])->middleware('auth', 'user')->name('transaksi.detail');

/* Item */
Route::get('item detail', [ItemController::class, 'indextest'])->middleware('auth', 'user')->name('item.detailtest');
Route::get('item detail/{id}', [ItemController::class, 'index'])->middleware('auth', 'user')->name('item.detail');

Route::get('item simulasi', [ItemController::class, 'simulasitest'])->middleware('auth', 'user')->name('item.simulasitest');
/* Route::get('item simulasi2', [ItemController::class, 'simulasitest2'])->middleware('auth', 'user')->name('item.simulasitest2'); */
Route::get('item simulasi/{id}', [ItemController::class, 'simulasi'])->middleware('auth', 'user')->name('item.simulasi');
Route::post('item simulasi', [ItemController::class, 'dummy_simulasi'])->middleware('auth', 'user')->name('item.dummysimulasi');

Route::get('item banding/{id}', [ItemController::class, 'bandingtest'])->middleware('auth', 'user')->name('item.bandingtest');
/* Route::get('item banding/{id}', [ItemController::class, 'banding'])->middleware('auth', 'user')->name('item.banding'); */

Route::get('item beli', [ItemController::class, 'belitest'])->middleware('auth', 'user')->name('item.belitest');
Route::get('item beli/{id}', [ItemController::class, 'beli'])->middleware('auth', 'user')->name('item.beli');
Route::post('item beli', [TransaksiController::class, 'store'])->name('transaksi.store');

Route::get('admin-transaksi', [AdminController::class, 'list_transaksi'])->middleware('auth', 'admin')->name('admin.transaksi');
Route::get('admin-transaksi/{id}', [AdminController::class, 'edit_transaksi'])->middleware('auth', 'admin')->name('admin.edit.transaksi');
Route::post('admin-transaksi', [AdminController::class, 'update_transaksi'])->middleware('auth', 'admin')->name('admin.update.transaksi');
Route::delete('admin-deletetransaksi/{id}', [AdminController::class, 'delete_transaksi'])->middleware('auth', 'admin')->name('admin.delete.transaksi');

Route::get('admin-penjualan', [AdminController::class, 'list_penjualan'])->middleware('auth', 'admin')->name('admin.penjualan');
Route::get('admin-penjualan/{id}', [AdminController::class, 'detail_penjualan'])->middleware('auth', 'admin')->name('admin.detail.penjualan');
Route::post('admin-penjualan', [AdminController::class, 'acc_penjualan'])->middleware('auth', 'admin')->name('admin.accept.penjualan');

Route::get('admin-item', [AdminController::class, 'list_item'])->middleware('auth', 'admin')->name('admin.item');
Route::get('admin-item/{id}', [AdminController::class, 'edit_item'])->middleware('auth', 'admin')->name('admin.edit.item');
Route::post('admin-item', [AdminController::class, 'update_item'])->middleware('auth', 'admin')->name('admin.update.item');
Route::get('admin-createitem', [AdminController::class, 'create_item'])->middleware('auth', 'admin')->name('admin.create.item');
Route::post('admin-createitem', [AdminController::class, 'store_item'])->middleware('auth', 'admin')->name('admin.store.item');
Route::delete('admin-deleteitem/{id}', [AdminController::class, 'delete_item'])->middleware('auth', 'admin')->name('admin.delete.item');

Route::get('admin-user', [AdminController::class, 'list_user'])->middleware('auth', 'admin')->name('admin.user');
Route::get('admin-user/{id}', [AdminController::class, 'edit_user'])->middleware('auth', 'admin')->name('admin.edit.user');
Route::post('admin-user', [AdminController::class, 'update_user'])->middleware('auth', 'admin')->name('admin.update.user');
/* Route::get('admin-createuser', [AdminController::class, 'create_user'])->middleware('auth', 'admin')->name('admin.create.user');
Route::post('admin-createuser', [AdminController::class, 'store_user'])->middleware('auth', 'admin')->name('admin.store.user'); */
Route::delete('admin-deleteuser/{id}', [AdminController::class, 'delete_user'])->middleware('auth', 'admin')->name('admin.delete.user');

Route::get('subadmin-item', [AdminController::class, 'sub_list_item'])->middleware('auth', 'subadmin')->name('subadmin.item');
