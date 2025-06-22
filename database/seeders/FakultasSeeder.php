<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FakultasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('fakultas')->insert([
            ['nama_fakultas' => 'Fakultas Teknik', 'created_at' => now(), 'updated_at' => now()],
            ['nama_fakultas' => 'Fakultas Ekonomi', 'created_at' => now(), 'updated_at' => now()],
            ['nama_fakultas' => 'Fakultas Ilmu Komputer', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
