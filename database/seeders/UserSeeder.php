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
                'email' => 'superadmin@puskescg.com',
                'password' => Hash::make('password123'),
                'gambar' => 'john_doe_image.jpg',
                'status' => 1,
                'deleted_at' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Admin 1',
                'email' => 'admin.satu@puskescg.com',
                'password' => Hash::make('password123'),
                'gambar' => 'jane_smith_image.jpg',
                'status' => 2,
                'deleted_at' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Admin 2',
                'email' => 'admin.dua@puskescg.com',
                'password' => Hash::make('password123'),
                'gambar' => 'joni_smith_image.jpg',
                'status' => 2,
                'deleted_at' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);
    }
}

