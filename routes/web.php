<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\FileDownloadController;

Route::get('/', [LoginController::class, 'index']);

Route::match(['get', 'post'], '/submit', [LoginController::class, 'loginform'])->name('login.submit');

Route::get('/download/{encodedUrl}', [FileDownloadController::class, 'download'])
    ->where('encodedUrl', '.*')
    ->name('download.file');
