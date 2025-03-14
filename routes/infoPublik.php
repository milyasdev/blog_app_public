<?php

use App\Http\Controllers\InformasiPublikController;

Route::get('/info-publik-bmkg-cuaca', [InformasiPublikController::class, 'dataBmkgCuaca'])->name('informasi_publik');