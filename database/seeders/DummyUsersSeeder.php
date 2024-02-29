<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userdata = [
            [
                'name' => 'mimin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('12345'),
                'role' => 'administrator',
                'namalengkap' => 'zaqi',
                'alamat' => 'malang'
            ],
            [
                'name' => 'mas petugas',
                'email' => 'petugas@gmail.com',
                'password' => bcrypt('12345'),
                'role' => 'petugas',
                'namalengkap' => 'fuad',
                'alamat' => 'blimbing'
            ],
            [
                'name' => 'mas peminjam',
                'email' => 'peminjam@gmail.com',
                'password' => bcrypt('12345'),
                'role' => 'peminjam',
                'namalengkap' => 'mahfud',
                'alamat' => 'balearjosari'
            ],
        ];

        foreach ($userdata as $key => $val){
            User::create($val);
        }

    }
}
