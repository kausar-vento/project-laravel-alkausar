<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\VerifikasiController;
use App\Http\Controllers\VerifikasiPenjualController;
use App\Http\Controllers\UserLoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseUserController;
use App\Http\Controllers\MateriCourseController;
use App\Http\Controllers\TransaksiUserController;
use App\Http\Controllers\TransaksiAdminController;
use App\Http\Controllers\PenjualLoginController;
use App\Http\Controllers\NextRegisterPenjualController;

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
    return view('welcome');
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
    'index' => 'admin.verifikasi.penjual'
])->middleware('auth:webadmin');

Route::resource('/admin-category', CategoryController::class)->names([
    'index' => 'admin.category',
    'create' => 'admin.category.create',
    'edit' => 'admin.category.edit'
])->middleware('auth:webadmin');

Route::resource('/admin-subcategory', SubCategoryController::class)->names([
    'index' => 'admin.subcategory',
    'create' => 'admin.subcategory.create',
    'edit' => 'admin.subcategory.edit'
])->middleware('auth:webadmin');

Route::resource('/admin-course', CourseController::class)->names([
    'index' => 'admin.course',
    'create' => 'admin.course.create',
    'edit' => 'admin.course.edit'
])->middleware('auth:webadmin');

Route::get('/admin/course/materi/{id}', [MateriCourseController::class, 'homeMateri'])
->name('admin.home.materiCourse')->middleware('auth:webadmin');

Route::get('/admin/course/materi/create/{id}', [MateriCourseController::class, 'createMateri'])
->name('admin.home.createMateriCourse')->middleware('auth:webadmin');

Route::post('/admin/course/materi/create', [MateriCourseController::class, 'postMateri'])
->name('admin.home.postMateriCourse')->middleware('auth:webadmin');

Route::get('/admin/course/materi/edit/{id}', [MateriCourseController::class, 'editMateri'])
->name('admin.home.editMateriCourse')->middleware('auth:webadmin');

Route::put('/admin/course/materi/edit/{id}', [MateriCourseController::class, 'updateMateri'])
->name('admin.home.updateMateriCourse')->middleware('auth:webadmin');

Route::delete('/admin/course/materi/delete/{id}', [MateriCourseController::class, 'deleteMateri'])
->name('admin.home.deleteMateriCourse')->middleware('auth:webadmin');

Route::get('/admin/transaksi/user', [TransaksiAdminController::class, 'transaksiUser'])
->name('admin.transaksiU')->middleware('auth:webadmin');

Route::put('/admin/transaksi/user/update/{id}', [TransaksiAdminController::class, 'updateTransaksi'])
->name('admin.transaksiU.update')->middleware('auth:webadmin');


// User
Route::get('/home/user', [UserLoginController::class, 'home'])->middleware('auth');
Route::get('/login/user', [UserLoginController::class, 'index'])->name('login-user');
Route::post('/login-user', [UserLoginController::class, 'store'])->name('user.loginUser');    
Route::get('/logout-user', [UserLoginController::class, 'logoutUser'])->name('logout-user');
Route::get('/register-user', [UserLoginController::class, 'homeRegister']);
Route::post('/register-user', [UserLoginController::class, 'prosesRegister'])->name('user.registerUser'); 
Route::get('/course/read/{id}', [CourseUserController::class, 'showCourse'])->name('user.readMore')->middleware('auth');
Route::get('/course/read/category/{id}', [CourseUserController::class, 'sortByCategory'])->name('user.readCategory')->middleware('auth');
Route::get('/course/allcourses', [CourseUserController::class, 'moreCourse'])->middleware('auth');
Route::get('/user/history', [TransaksiUserController::class, 'historyTransaksi'])->middleware('auth');
Route::get('/user/transaksi/{id}', [TransaksiUserController::class, 'formTransaksi'])->name('user.fTransaksi')->middleware('auth');
Route::post('/user/transaksi/store', [TransaksiUserController::class, 'storeTransaksi'])->name('user.pTransaksi')->middleware('auth');
Route::get('/user/kelas', [TransaksiUserController::class, 'homeKelas'])->name('user.hKelas')->middleware('auth');
Route::get('/user/kelas/read/{id}', [CourseUserController::class, 'readKelas'])->name('user.bacaKelas')->middleware('auth');

// Penjual
Route::get('/home/penjual', [PenjualLoginController::class, 'homePenjual'])->name('penjual.indexPenjual')->middleware('auth:webpenjual');
Route::get('/login/penjual', [PenjualLoginController::class, 'loginPenjual'])->name('penjual.loginPenjual');
Route::post('/proses/login/penjual', [PenjualLoginController::class, 'prosesLoginPenjual'])->name('penjual.prosesLoginPenjual');
Route::get('/proses/logout/penjual', [PenjualLoginController::class, 'logoutPenjual'])->name('penjual.prosesLogoutPenjual')->middleware('auth:webpenjual');
Route::get('/home/penjual/verifikasiPenjual', [NextRegisterPenjualController::class, 'createVerifikasi'])->name('penjual.verifikasiPenjual')->middleware('auth:webpenjual');


