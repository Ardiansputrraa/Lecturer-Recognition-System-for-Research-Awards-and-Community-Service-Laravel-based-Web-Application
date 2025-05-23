<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HkiSeeder extends Seeder
{
    public function run()
    {
        $statusList = ['Draft', 'Diajukan', 'Disetujui', 'Ditolak'];
        $jenisList = ['Hak Cipta', 'Paten', 'Desain Industri', 'Merek Dagang'];

        // Ambil semua dosen dari tabel dosen
        $dosenList = DB::table('dosen')->get();

        foreach (range(1, 15) as $i) {
            $dosen = $dosenList->random();

            DB::table('hki')->insert([
                'dosen_id' => $dosen->id,
                'nama_dosen' => $dosen->nama_lengkap,
                'hak_cipta' => $dosen->nama_lengkap,
                'judul' => 'Judul ' . $i . ' Hak Kekayaan Intelektual',
                'jenis' => $jenisList[array_rand($jenisList)],
                'tahun' => rand(2021, 2025),
                'status' => $statusList[array_rand($statusList)],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
