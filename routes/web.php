<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DosenController;

Route::get('/login', function () {
    return view('auth.login');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('/', 'viewLogin')->name('login');
    Route::post('login-check', 'loginCheck')->name('login.check');
});

Route::middleware(['auth'])->group(function () {
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});

Route::get('/dashboard', function () {
    return view('dashboard.home.home');
});

Route::get('/profile', function () {
    return view('profile.profile');
});

Route::get('/home', function () {
    return view('dashboard.home.home');
});

Route::get('/kelola-dosen', function () {
    return view(view: 'dashboard.kelola-dosen.dosen');
});

Route::middleware(['auth'])->group(function () {
    Route::controller(DosenController::class)->group(function () {
        Route::get('kelola-dosen', 'viewManageDosen')->name('kelola-dosen');
        Route::get('detail-dosen/{dosen_id}', 'detailDataDosen')->name('delete.dosen');
        Route::post('add-dosen', 'addDataDosen')->name('add.dosen');
        Route::post('update-dosen', 'updateDataDosen')->name('update.dosen');
        Route::get('search-dosen', 'searchDataDosen')->name('search.dosen');
        Route::get('download-dosen', 'downloadDataDosen')->name('download.dosen');
        Route::get('delete-dosen/{dosen_id}', 'deleteDataDosen')->name('delete.dosen');
    });
});


Route::get('/publikasi-dosen', function () {
    return view('dashboard.publikasi-dosen.publikasi');
});

Route::get('/detail-publikasi-dosen', function () {
    return view('dashboard.publikasi-dosen.detail-publikasi');
});

Route::get('/hki-dosen', function () {
    return view('dashboard.hki-dosen.hki');
});

Route::get('/detail-hki-dosen', function () {
    return view('dashboard.hki-dosen.detail-hki');
});

Route::get('/penelitian-dosen', function () {
    return view('dashboard.penelitian-dosen.penelitian');
});

Route::get('/detail-penelitian-dosen', function () {
    return view('dashboard.penelitian-dosen.detail-penelitian');
});


Route::get('/pengabdian-dosen', function () {
    return view('dashboard.pengabdian-dosen.pengabdian');
});

Route::get('/detail-pengabdian-dosen', function () {
    return view('dashboard.pengabdian-dosen.detail-pengabdian');
});
