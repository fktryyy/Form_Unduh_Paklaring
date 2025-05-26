<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\FileDownloadController;

Route::get('/', [LoginController::class, 'index']);
Route::post('/submit', [LoginController::class, 'loginform'])->name('login.submit');
Route::get('/submit', function () {
    return redirect('/')->with('error', 'Akses tidak valid. Silakan login melalui form.');
});
Route::get('/download/{encodedUrl}', [FileDownloadController::class, 'download'])
    ->where('encodedUrl', '.*') // supaya URL bisa panjang
    ->name('download.file');