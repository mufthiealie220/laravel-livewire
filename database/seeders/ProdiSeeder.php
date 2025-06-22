<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('prodi')->insert([
            ['nama_prodi' => 'Teknik Informatika', 'fakultas_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['nama_prodi' => 'Sistem Informasi', 'fakultas_id' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['nama_prodi' => 'Manajemen', 'fakultas_id' => 2, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
