<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\VerifikasiController;
use App\Http\Controllers\VerifikasiPenjualController;
use App\Http\Controllers\UserLoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProdukBukuController;
use App\Http\Controllers\PenjualLoginController;
use App\Http\Controllers\NextRegisterPenjualController;
use App\Http\Controllers\CrudBukuController;
use App\Models\Buku;
use App\Models\Penjual;
use App\Models\Category;
use App\Models\User;

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
    $cU = User::latest()->get()->count();
    $cP = Penjual::latest()->get()->count();
    $total = $cU + $cP;
    return view('welcome', [
        'cBuku' => Buku::latest()->get()->count(),
        'cPenjual' => Penjual::latest()->get()->count(),
        'cCategory' => Category::latest()->get()->count(),
        'cUser' => $total
    ]);
});

// Admin
Route::get('/home/admin', [AdminLoginController::class, 'home'])->name('admin.homeAdmin')->middleware('auth:webadmin');
Route::get('/login/admin', [AdminLoginController::class, 'index'])->name('login-admin');
Route::post('/login-admin', [AdminLoginController::class, 'store'])->name('admin.loginAdmin');    
Route::get('/logout-admin', [AdminLoginController::class, 'logoutAdmin'])->name('admin.logOut')->middleware('auth:webadmin');

Route::resource('/verifikasi-user', VerifikasiController::class)->names([
    'index' => 'admin.verifikasi',
    'edit' => 'admin.verifikasi.edit'
])->middleware('auth:webadmin');

Route::resource('/verifikasi-penjual', VerifikasiPenjualController::class)->names([
    'index' => 'admin.verifikasi.penjual',
    'edit' => 'admin.verifikasi.penjual.edit',
    'show' => 'admin.verifikasi.penjual.show'
])->middleware('auth:webadmin');

Route::resource('/admin-category', CategoryController::class)->names([
    'index' => 'admin.category',
    'create' => 'admin.category.create',
    'edit' => 'admin.category.edit'
])->middleware('auth:webadmin');

// User
Route::get('/home/user', [UserLoginController::class, 'home'])->middleware('auth');
Route::get('/home/user/about', [UserLoginController::class, 'aboutUser'])->middleware('auth');
Route::get('/login/user', [UserLoginController::class, 'index'])->name('login-user');
Route::post('/login-user', [UserLoginController::class, 'store'])->name('user.loginUser');    
Route::get('/logout-user', [UserLoginController::class, 'logoutUser'])->name('logout-user');
Route::get('/register-user', [UserLoginController::class, 'homeRegister']);
Route::post('/register-user', [UserLoginController::class, 'prosesRegister'])->name('user.registerUser'); 
Route::get('/home/user/product/buku/{id}', [ProdukBukuController::class, 'getBuku'])->name('user.getProductBuku'); 

// Penjual
Route::get('/home/penjual', [PenjualLoginController::class, 'homePenjual'])->name('penjual.indexPenjual')->middleware('auth:webpenjual');
Route::get('/login/penjual', [PenjualLoginController::class, 'loginPenjual'])->name('penjual.loginPenjual');
Route::get('/register/penjual', [PenjualLoginController::class, 'registerPenjual'])->name('penjual.registerPenjual');
Route::post('/proses/login/penjual', [PenjualLoginController::class, 'prosesLoginPenjual'])->name('penjual.prosesLoginPenjual');
Route::post('/proses/register/penjual', [PenjualLoginController::class, 'registerP'])->name('penjual.prosesRegisterPenjual');
Route::get('/proses/logout/penjual', [PenjualLoginController::class, 'logoutPenjual'])->name('penjual.prosesLogoutPenjual')->middleware('auth:webpenjual');
Route::get('/home/penjual/verifikasiPenjual', [NextRegisterPenjualController::class, 'createVerifikasi'])->name('penjual.verifikasiPenjual')->middleware('auth:webpenjual');
Route::post('/home/penjual/verifikasiPenjual/store', [NextRegisterPenjualController::class, 'storeVerifikasi'])->name('penjual.verifikasiPenjual.store')->middleware('auth:webpenjual');

Route::resource('/penjual-crud-buku', CrudBukuController::class)->names([
    'index' => 'penjual.crud.buku',
    'create' => 'penjual.crud.buku.create',
    'edit' => 'penjual.crud.buku.edit'
])->middleware('auth:webpenjual');



