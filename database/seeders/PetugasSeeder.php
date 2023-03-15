<?php

namespace Database\Seeders;

use App\Models\Petugas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PetugasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Petugas::create([
            [
                'nama' => 'admin',
                'username' => 'admin@admin.com',
                'password' => Hash::make('admin@admin.com'),
                'level' => 'admin'
            ],
            [
                'nama' => 'petugas',
                'username' => 'petugas@petugas.com',
                'password' => Hash::make('petugas@petugas.com'),
                'level' => 'petugas'
            ],
        ]);
    }
}
