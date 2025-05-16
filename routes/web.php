<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard.home.home');
});

Route::get('/login', function () {
    return view('auth.login');
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

Route::get('/detail-dosen', function () {
    return view(view: 'dashboard.kelola-dosen.detail-dosen');
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