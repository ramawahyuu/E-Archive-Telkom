<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userData = [

            [
                'name' => 'Syifana Maharani',
                'email' => 'admin@gmail.com',
                'role' => 'admin',
                'nip'  => '16223013',
                'password' => Hash::make('admin123'),
            ],
            [
                'name' => 'Syifana Maharani',
                'email' => 'mahasiswa@gmail.com',
                'role' => 'mahasiswa',
                'nip' => '16223013',
                'password' => Hash::make('mahasiswa123'),
            ],
            [
                'name' => 'Syifana Maharani',
                'email' => 'himpunan@gmail.com',
                'role' => 'himpunan',
                'nip' => '16223013',
                'password' => Hash::make('himpunan123'),
            ],
            [
                'name' => 'Syifana Maharani',
                'email' => 'wadek@gmail.com',
                'role' => 'wadek',
                'nip' => '16223013',
                'password' => Hash::make('wadek123'),
            ],
            [
                'name' => 'SyifanaMaharani',
                'email' => 'kemahasiswaan@gmail.com',
                'role' => 'kemahasiswaan',
                'nip' => '16223013',
                'password' => Hash::make('kemahasiswaan123'),
            ],


        ];

        foreach ($userData as $userData) {
            // Periksa apakah data sudah ada sebelum mencoba membuatnya
            if (!DB::table('users')->where('email', $userData['email'])->exists()) {
                DB::table('users')->insert($userData);
            }
        }
    }
}
