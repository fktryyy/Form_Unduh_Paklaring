<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\FileDownloadController;

Route::get('/', [LoginController::class, 'index'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::get('/download/{encodedUrl}', [FileDownloadController::class, 'download'])
    ->where('encodedUrl', '.*') // supaya URL bisa panjang
    ->name('download.file');