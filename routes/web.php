<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\PublikasiController;
use App\Http\Controllers\PenelitianController;
use App\Http\Controllers\PengabdianController;

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
        Route::get('penelitian-dosen', 'viewPagePenelitian')->name('penelitian.dosen');
        Route::get('detail-penelitian/{penelitian_id}', 'detailDataPenelitian')->name('detail.penelitian');
        Route::post('add-penelitian', 'addDataPenelitian')->name(name: 'add.penelitian');
        Route::post('update-penelitian', 'updateDataPenelitian')->name('update.penelitian');
        Route::get('search-penelitian', 'searchDataPenelitian')->name('search.penelitian');
        Route::get('download-penelitian', 'downloadDataPenelitian')->name('download.penelitian');
        Route::get('delete-penelitian/{penelitian_id}', 'deleteDataPenelitian')->name('delete.penelitian');

        Route::post('upload-file-penelitian', 'uploadFilePenelitian')->name('upload.file.penelitian');
        Route::get('download-file-penelitian/{file_id}', 'downloadFilePenelitian')->name('download.file.penelitian');
        Route::get('delete-file-penelitian/{file_id}', 'deleteFilePenelitian')->name('delete.file.penelitian');

        Route::post('add-komentar-penelitian', 'addKomentarPenelitian')->name('add.komentar.penelitian');
        Route::get('delete-komentar-penelitian/{komentar_id}', 'deleteKomentarPenelitian')->name('delete.komentar.penelitian');

        Route::post('add-kolaborasi-penelitian', 'addKolaborasiPenelitian')->name('add.kolaborasi.penelitian');
        Route::get('delete-kolaborasi-penelitian/{kolaborasi_id}', 'deleteKolaborasiPenelitian')->name('delete.kolaborasi.penelitian');
    });
});

Route::middleware(['auth'])->group(function () {
    Route::controller(PublikasiController::class)->group(function () {
        Route::get('publikasi-dosen', 'viewPagePublikasi')->name('publikasi.dosen');
        Route::get('detail-publikasi/{publikasi_id}', 'detailDataPublikasi')->name('detail.publikasi');
        Route::post('add-publikasi', 'addDataPublikasi')->name('add.publikasi');
        Route::post('update-publikasi', 'updateDataPublikasi')->name('update.publikasi');
        Route::get('search-publikasi', 'searchDataPublikasi')->name('search.publikasi');
        Route::get('download-publikasi', 'downloadDataPublikasi')->name('download.publikasi');
        Route::get('delete-publikasi/{publikasi_id}', 'deleteDataPublikasi')->name('delete.publikasi');

        Route::post('upload-file-publikasi', 'uploadFilePublikasi')->name('upload.file.publikasi');
        Route::get('download-file-publikasi/{file_id}', 'downloadFilePublikasi')->name('download.file.publikasi');
        Route::get('delete-file-publikasi/{file_id}', 'deleteFilePublikasi')->name('delete.file.publikasi');

        Route::post('add-komentar-publikasi', 'addKomentarPublikasi')->name('add.komentar.publikasi');
        Route::get('delete-komentar-publikasi/{komentar_id}', 'deleteKomentarPublikasi')->name('delete.komentar.publikasi');

        Route::post('add-kolaborasi-publikasi', 'addKolaborasiPublikasi')->name('add.kolaborasi.publikasi');
        Route::get('delete-kolaborasi-publikasi/{kolaborasi_id}', 'deleteKolaborasiPublikasi')->name('delete.kolaborasi.publikasi');
    });
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
