<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

/**
 * HTTP Method:
 * 1. Get : Untuk menampilkan
 * 2. Post : Untuk mengirim data
 * 3. Put : Untuk mengirim data
 * 4. Delete : Untuk menghapus data
 */

//route utk menampilkan teks salam
Route::get('admin/dashboard', [DashboardController::class, 'index']);


