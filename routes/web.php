<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\PenelitianController;

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
        Route::get('kelola-dosen', 'viewManageDosen')->name('kelola.dosen');
        Route::get('detail-dosen/{dosen_id}', 'detailDataDosen')->name('detail.dosen');
        Route::post('add-dosen', 'addDataDosen')->name('add.dosen');
        Route::post('update-dosen', 'updateDataDosen')->name('update.dosen');
        Route::get('search-dosen', 'searchDataDosen')->name('search.dosen');
        Route::get('download-dosen', 'downloadDataDosen')->name('download.dosen');
        Route::get('delete-dosen/{dosen_id}', 'deleteDataDosen')->name('delete.dosen');

        Route::post('read-notifikasi', 'readNotifikasi')->name('read.notifikasi');
    });
});

Route::middleware(['auth'])->group(function () {
    Route::controller(PenelitianController::class)->group(function () {
        Route::get('penelitian-dosen', 'viewPagePeneleitian')->name('penelitian.dosen');
        Route::get('detail-penelitian/{penelitian_id}', 'detailDataPeneleitian')->name('detail.penelitian');
        Route::post('add-penelitian', 'addDataPenelitian')->name('add.penelitian');
        Route::post('update-penelitian', 'updateDataPenelitian')->name('update.penelitian');
        Route::get('search-penelitian', 'searchDataPenelitian')->name('search.penelitian');
        Route::get('download-penelitian', 'downloadDataPenelitian')->name('download.penelitian');
        Route::get('delete-penelitian/{penelitian_id}', 'deleteDataPenelitian')->name('delete.penelitian');

        Route::post('upload-file-penelitian', 'uploadFilePenelitian')->name('upload.file.penelitian');
        Route::get('download-file-penelitian/{file_id}', 'downloadFilePenelitian')->name('download.file.penelitian');
        Route::get('delete-file-penelitian/{file_id}', 'deleteFilePenelitian')->name('delete.file.penelitian');

        Route::post('add-komentar', 'addKomentarPenelitian')->name('add.komentar');
        Route::get('delete-komentar/{komentar_id}', 'deleteKomentarPenelitian')->name('delete.komentar');

        Route::post('add-kolaborasi', 'addKolaborasiPenelitian')->name('add.kolaborasi');
        Route::get('delete-kolaborasi/{kolaborasi_id}', 'deleteKolaborasiPenelitian')->name('delete.kolaborasi');
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

Route::get('/pengabdian-dosen', function () {
    return view('dashboard.pengabdian-dosen.pengabdian');
});

Route::get('/detail-pengabdian-dosen', function () {
    return view('dashboard.pengabdian-dosen.detail-pengabdian');
});
