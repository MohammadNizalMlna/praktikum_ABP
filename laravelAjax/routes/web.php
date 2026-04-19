<?php

use App\Http\Controllers\MahasiswaController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MahasiswaController::class, 'index']);
Route::get('/get-mahasiswa', [MahasiswaController::class, 'getData'])->name('mahasiswa.data');
