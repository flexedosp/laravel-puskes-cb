<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Super Admin',
                'username' => 'superadmin@pcb.com',
                'password' => Hash::make('password123'),
                'gambar' => 'default_user.jpg',
                'jenis_kelamin' => 1,
                'status' => 1,
                'deleted_at' => null,
                'created_at' => Carbon::now(),
                'updated_at' => null,
            ],
            [
                'name' => 'Admin 1',
                'username' => 'admin.satu@pcb.com',
                'password' => Hash::make('password123'),
                'gambar' => 'default_user.jpg',
                'jenis_kelamin' => 2,
                'status' => 2,
                'deleted_at' => null,
                'created_at' => Carbon::now(),
                'updated_at' => null,
            ],
            [
                'name' => 'Admin 2',
                'username' => 'admin.dua@pcb.com',
                'password' => Hash::make('password123'),
                'gambar' => 'default_user.jpg',
                'jenis_kelamin' => 2,
                'status' => 2,
                'deleted_at' => null,
                'created_at' => Carbon::now(),
                'updated_at' => null,
            ]
        ]);
    }
}

