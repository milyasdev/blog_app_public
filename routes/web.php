<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [MainController::class, 'index'])->name('home');
Route::get('/detail/{id}', [MainController::class, 'detail'])->name('detail');
Route::post('/tambah-komentar/{id}', [MainController::class, 'prosesTambahArtikel'])->name('proses_komentar');
Route::get('/contact', [MainController::class, 'formContact'])->middleware('custom.throttle')->name('form-contact');
Route::post('/contact-proses', [MainController::class, 'prosesContact'])->name('prosesContact');
Route::get('/reload-captcha', [MainController::class, 'reload'])->name('reload');

Route::get('/login-admins', [AdminController::class, 'loginAdmins'])->name('halaman_login');
Route::post('/proses-login-admins', [AdminController::class, 'prosesLoginAdmins'])->name('proses_login');

Route::middleware(['admin'])->group(function () {
        Route::get('/admin',[AdminController::class, 'index'])->name('adminIndex');
        Route::get('/form', [AdminController::class, 'formTambahArtikel'])->name('form_tambah_artikel');
        Route::post('/tambah-artikel', [AdminController::class, 'prosesTambahArtikel'])->name('proses_tambah_artikel');
        Route::get('/form-user', [AdminController::class, 'formTambahUser'])->name('form_tambah_user');
        Route::post('/tambah-user', [AdminController::class, 'prosesTambahUser'])->name('proses_tambah_user');
        Route::get('/proses-logout', [AdminController::class, 'prosesLogoutAdmins'])->name('proses_logout');
});