<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            [
                'id' => 2,
                'email' => 'admin@gmail.com',
                'password' => Hash::make('password'), // Ganti jika perlu
                'role' => 'admin',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 3,
                'email' => 'andreas.febrian@yarsi.ac.id',
                'password' => Hash::make('password'),
                'role' => 'dosen',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 4,
                'email' => 'herika.hayurani@yarsi.ac.id',
                'password' => Hash::make('password'),
                'role' => 'dosen',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 5,
                'email' => 'mubarik.ahmad@yarsi.ac.id',
                'password' => Hash::make('password'),
                'role' => 'dosen',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 6,
                'email' => 'elan.suherlan@yarsi.ac.id',
                'password' => Hash::make('password'),
                'role' => 'dosen',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 7,
                'email' => 'chandra.prasetyo@yarsi.ac.id',
                'password' => Hash::make('password'),
                'role' => 'dosen',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 8,
                'email' => 'ummi.azizah@yarsi.ac.id',
                'password' => Hash::make('password'),
                'role' => 'dosen',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 9,
                'email' => 'ahmad.sabiq@yarsi.ac.id',
                'password' => Hash::make('password'),
                'role' => 'dosen',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
