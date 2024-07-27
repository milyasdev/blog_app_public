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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [MainController::class, 'index'])->name('home');
Route::get('/detail/{id}', [MainController::class, 'detail'])->name('detail');
Route::post('/tambah-komentar/{id}', [MainController::class, 'prosesTambahArtikel'])->name('proses_komentar');


Route::get('/admin',[AdminController::class, 'index'])->name('adminIndex');
Route::get('/form', [AdminController::class, 'formTambahArtikel'])->name('form_tambah_artikel');
Route::post('/tambah-artikel', [AdminController::class, 'prosesTambahArtikel'])->name('proses_tambah_artikel');