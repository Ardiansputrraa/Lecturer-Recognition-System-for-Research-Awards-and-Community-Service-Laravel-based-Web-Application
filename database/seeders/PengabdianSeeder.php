<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PengabdianSeeder extends Seeder
{
    public function run()
    {
        $statusList = ['Draft', 'Diajukan', 'Disetujui', 'Ditolak'];
        $jabatanList = ['Ketua', 'Anggota'];

        for ($i = 0; $i < 15; $i++) {
            $tahun = rand(2021, 2025);
            $dosen_id = rand(1, 7); 
            $besaran_dana = rand(10, 100) * 1000000;

            $dosen = DB::table('dosen')->where('id', $dosen_id)->first();

            DB::table('pengabdian')->insert([
                'dosen_id'     => $dosen_id,
                'nama_dosen'   => $dosen->nama_lengkap,
                'jabatan'      => $jabatanList[array_rand($jabatanList)],
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
