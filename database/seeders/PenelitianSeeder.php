<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenelitianSeeder extends Seeder
{
    public function run()
    {
        $statusList = ['Draft', 'Diajukan', 'Disetujui', 'Ditolak'];
        $jabatanList = ['Ketua', 'Anggota'];
        $judulContoh = [
            'Pengembangan Sistem Informasi Akademik',
            'Analisis Data Mahasiswa Menggunakan AI',
            'Penerapan IoT untuk Monitoring Lingkungan',
            'Sistem Deteksi Penyakit Tanaman',
            'Perancangan Aplikasi Mobile Edukasi',
            'Optimasi Jaringan Neural untuk Prediksi Cuaca',
            'Sistem Pendukung Keputusan Penentuan Beasiswa',
            'Analisis Sentimen Media Sosial dengan NLP',
            'Penggunaan Blockchain untuk Sertifikasi Digital',
            'Sistem Rekomendasi Buku Perpustakaan',
            'Aplikasi Deteksi Hoax Berbasis Web',
            'Studi Komparatif Framework Backend Laravel dan ExpressJS',
            'Desain UI/UX pada Aplikasi Kesehatan',
            'Pengembangan LMS untuk Pembelajaran Jarak Jauh',
            'Pemetaan Persebaran Penyakit Menggunakan GIS'
        ];

        for ($i = 0; $i < 15; $i++) {
            $tahun = rand(2021, 2025);
            $dosen_id = rand(1, 7); 
            $judul = $judulContoh[$i];
            $besaran_dana = rand(10, 100) * 1000000;

            $dosen = DB::table('dosen')->where('id', $dosen_id)->first();

            DB::table('penelitian')->insert([
                'dosen_id'     => $dosen_id,
                'nama_dosen'   => $dosen->nama_lengkap,
                'jabatan'      => $jabatanList[array_rand($jabatanList)],
                'judul'        => $judul,
                'tahun'        => $tahun,
                'besaran_dana' => $besaran_dana,
                'sumber_dana'  => 'DRPM DIKTI',
                'status'       => $statusList[array_rand($statusList)],
                'created_at'   => Carbon::now(),
                'updated_at'   => Carbon::now(),
            ]);
        }
    }
}
