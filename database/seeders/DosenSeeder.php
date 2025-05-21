<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DosenSeeder extends Seeder
{
    public function run()
    {
        DB::table('dosen')->insert([
            [
                'id' => 1,
                'user_id' => 3,
                'nama_lengkap' => 'Andreas Febrian, S.Kom., M.Kom., Ph.D.',
                'nip' => '123123123123',
                'fakultas' => 'Fakultas Teknologi Informasi',
                'prodi' => 'Prodi Teknik Informatika',
                'no_telepon' => '08123123123',
                'foto_profile' => 'storage/images/profiles/profile.jpeg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 2,
                'user_id' => 4,
                'nama_lengkap' => 'Herika Hayurani, M.Kom.',
                'nip' => '325232432423',
                'fakultas' => 'Fakultas Teknologi Informasi',
                'prodi' => 'Prodi Teknik Informatika',
                'no_telepon' => '081231231232',
                'foto_profile' => 'storage/images/profiles/profile.jpeg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 3,
                'user_id' => 5,
                'nama_lengkap' => 'Mubarik Ahmad, Dr., M.Kom.',
                'nip' => '1523124131232',
                'fakultas' => 'Fakultas Teknologi Informasi',
                'prodi' => 'Prodi Teknik Informatika',
                'no_telepon' => '081237812738712',
                'foto_profile' => 'storage/images/profiles/profile.jpeg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 4,
                'user_id' => 6,
                'nama_lengkap' => 'Elan Suherlan, M.Si.',
                'nip' => '0128391283',
                'fakultas' => 'Fakultas Teknologi Informasi',
                'prodi' => 'Prodi Teknik Informatika',
                'no_telepon' => '081982398123',
                'foto_profile' => 'storage/images/profiles/profile.jpeg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 5,
                'user_id' => 7,
                'nama_lengkap' => 'Chandra Prasetyo Utomo, M.S.',
                'nip' => '012893912839',
                'fakultas' => 'Fakultas Teknologi Informasi',
                'prodi' => 'Prodi Teknik Informatika',
                'no_telepon' => '081293829183',
                'foto_profile' => 'storage/images/profiles/profile.jpeg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 6,
                'user_id' => 8,
                'nama_lengkap' => 'Dr. Ummi Azizah Rachmawati, S.Kom., M.Kom.',
                'nip' => '0129319273',
                'fakultas' => 'Fakultas Teknologi Informasi',
                'prodi' => 'Prodi Teknik Informatika',
                'no_telepon' => '01298312839',
                'foto_profile' => 'storage/images/profiles/profile.jpeg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 7,
                'user_id' => 9,
                'nama_lengkap' => 'Ahmad Sabiq, M.Kom.',
                'nip' => '9182730127',
                'fakultas' => 'Fakultas Teknologi Informasi',
                'prodi' => 'Prodi Teknik Informatika',
                'no_telepon' => '08127381273212',
                'foto_profile' => 'storage/images/profiles/profile.jpeg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
