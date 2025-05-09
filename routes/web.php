<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard.home.home');
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

Route::get('/penelitian-dosen', function () {
    return view('dashboard.penelitian-dosen.penelitian');
});

Route::get('/detail-penelitian-dosen', function () {
    return view('dashboard.penelitian-dosen.detail-penelitian');
});