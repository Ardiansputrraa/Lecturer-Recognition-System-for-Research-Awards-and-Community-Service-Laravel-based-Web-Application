<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    public function run()
    {
        DB::table('admin')->insert([
            'id' => 1,
            'user_id' => 2,
            'nama_lengkap' => 'Admin Yarsi',
            'no_telepon' => '08123123172',
            'foto_profile' => 'storage/images/profiles/profile.jpeg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
