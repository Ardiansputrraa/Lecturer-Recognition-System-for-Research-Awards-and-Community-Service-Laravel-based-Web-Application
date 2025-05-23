<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HkiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\PublikasiController;
use App\Http\Controllers\PenelitianController;
use App\Http\Controllers\PengabdianController;
use App\Http\Controllers\SuratTugasController;

Route::get('/login', function () {
    return view('auth.login');
});


Route::controller(AuthController::class)->group(function () {
    Route::get('/', 'viewLogin')->name('login');
    Route::post('login-check', 'loginCheck')->name('login.check');
});


Route::middleware(['auth'])->group(function () {
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/profile', function () {
        return view('profile.profile');
    });
});

Route::middleware(['auth'])->group(function () {
    Route::controller(HomeController::class)->group(function () {
        Route::get('home', 'viewPageHome')->name('home');
    });
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

Route::middleware(['auth'])->group(function () {
    Route::controller(HkiController::class)->group(function () {
        Route::get('hki-dosen', 'viewPageHki')->name('hki.dosen');
        Route::get('detail-hki/{hki_id}', 'detailDataHki')->name('detail.hki');
        Route::post('add-hki', 'addDataHki')->name('add.hki');
        Route::post('update-hki', 'updateDataHki')->name('update.hki');
        Route::get('search-hki', 'searchDataHki')->name('search.hki');
        Route::get('download-hki', 'downloadDataHki')->name('download.hki');
        Route::get('delete-hki/{hki_id}', 'deleteDataHki')->name('delete.hki');

        Route::post('upload-file-hki', 'uploadFileHki')->name('upload.file.hki');
        Route::get('download-file-hki/{file_id}', 'downloadFileHki')->name('download.file.hki');
        Route::get('delete-file-hki/{file_id}', 'deleteFileHki')->name('delete.file.hki');

        Route::post('add-komentar-hki', 'addKomentarHki')->name('add.komentar.hki');
        Route::get('delete-komentar-hki/{komentar_id}', 'deleteKomentarHki')->name('delete.komentar.hki');

        Route::post('add-kolaborasi-hki', 'addKolaborasiHki')->name('add.kolaborasi.hki');
        Route::get('delete-kolaborasi-hki/{kolaborasi_id}', 'deleteKolaborasiHki')->name('delete.kolaborasi.hki');
    });
});

Route::middleware(['auth'])->group(function () {
    Route::controller(PengabdianController::class)->group(function () {
        Route::get('pengabdian-dosen', 'viewPagePengabdian')->name('pengabdian.dosen');
        Route::get('detail-pengabdian/{pengabdian_id}', 'detailDataPengabdian')->name('detail.pengabdian');
        Route::post('add-pengabdian', 'addDataPengabdian')->name(name: 'add.pengabdian');
        Route::post('update-pengabdian', 'updateDataPengabdian')->name('update.pengabdian');
        Route::get('search-pengabdian', 'searchDataPengabdian')->name('search.pengabdian');
        Route::get('download-pengabdian', 'downloadDataPengabdian')->name('download.pengabdian');
        Route::get('delete-pengabdian/{pengabdian_id}', 'deleteDataPengabdian')->name('delete.pengabdian');

        Route::post('upload-file-pengabdian', 'uploadFilePengabdian')->name('upload.file.pengabdian');
        Route::get('download-file-pengabdian/{file_id}', 'downloadFilePengabdian')->name('download.file.pengabdian');
        Route::get('delete-file-pengabdian/{file_id}', 'deleteFilePengabdian')->name('delete.file.pengabdian');

        Route::post('add-komentar-pengabdian', 'addKomentarPengabdian')->name('add.komentar.pengabdian');
        Route::get('delete-komentar-pengabdian/{komentar_id}', 'deleteKomentarPengabdian')->name('delete.komentar.pengabdian');

        Route::post('add-kolaborasi-pengabdian', 'addKolaborasiPengabdian')->name('add.kolaborasi.pengabdian');
        Route::get('delete-kolaborasi-pengabdian/{kolaborasi_id}', 'deleteKolaborasiPengabdian')->name('delete.kolaborasi.pengabdian');
    });
});

Route::middleware(['auth'])->group(function () {
    Route::controller(SuratTugasController::class)->group(function () {
        Route::get('surat-tugas-dosen', 'viewSuratTugas')->name('surat.tugas');
        Route::post('preview-surat-tugas', 'previewSuratTugas')->name('preview.surat');
        Route::post('download-surat-tugas', 'downloadSuratTugas')->name('download.surat');
    });
});
