<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PublikasiSeeder extends Seeder
{
    public function run()
    {
        $statusList = ['Draft', 'Diajukan', 'Disetujui', 'Ditolak'];
        $kontributorList = ['Penulis Tunggal', 'Penulis Kedua', 'Penulis Bersama'];
        $jenisList = ['Jurnal Nasional', 'Jurnal Internasional', 'Konferensi Nasional', 'Konferensi Internasional'];
        $penerbitList = ['IEEE', 'ACM', 'Elsevier', 'Springer', 'Universitas XYZ'];
        $judulList = [
            'Analisis Algoritma Sorting untuk Big Data',
            'Implementasi Machine Learning pada Sistem Diagnostik',
            'Keamanan Siber di Era Digital',
            'Blockchain untuk Transparansi Publik',
            'Pengembangan Aplikasi Mobile Berbasis Flutter',
            'Perbandingan Framework Web: Laravel vs CodeIgniter',
            'Internet of Things dalam Smart City',
            'Kecerdasan Buatan untuk Deteksi Penyakit',
            'Sistem Rekomendasi pada E-Commerce',
            'Optimasi Query SQL pada Big Database',
            'Deteksi Kecurangan Menggunakan Data Mining',
            'Cloud Computing untuk Pendidikan',
            'Pemanfaatan Teknologi AR dalam Pembelajaran',
            'Analisis Sentimen di Media Sosial',
            'Studi Kasus UI/UX pada Aplikasi Kesehatan'
        ];

        // Ambil semua dosen
        $dosenList = DB::table('dosen')->get();

        foreach (range(1, 15) as $i) {
            $dosen = $dosenList->random();

            DB::table('publikasi')->insert([
                'dosen_id' => $dosen->id,
                'nama_dosen' => $dosen->nama_lengkap,
                'kontributor' => $kontributorList[array_rand($kontributorList)],
                'judul' => $judulList[$i - 1],
                'jenis' => $jenisList[array_rand($jenisList)],
                'penerbit' => $penerbitList[array_rand($penerbitList)],
                'tahun' => rand(2021, 2025),
                'status' => $statusList[array_rand($statusList)],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
