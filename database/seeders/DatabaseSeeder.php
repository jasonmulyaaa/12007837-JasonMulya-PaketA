<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\Petugas::create([
            'nama_petugas' => 'admin',
            'username' => 'admin',
            'password' => bcrypt('admin'),
            'telp' => '123123',
            'level' => 'admin',
        ]);
    }
}
