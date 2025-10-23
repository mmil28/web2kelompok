<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MataPelajaran;

class MataPelajaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mapel = [
            ['nama_mapel' => 'Matematika'],
            ['nama_mapel' => 'Bahasa Indonesia'],
            ['nama_mapel' => 'Bahasa Inggris'],
            ['nama_mapel' => 'Fisika'],
            ['nama_mapel' => 'Kimia'],
            ['nama_mapel' => 'Biologi'],
            ['nama_mapel' => 'Sejarah'],
            ['nama_mapel' => 'Geografi'],
            ['nama_mapel' => 'Ekonomi'],
        ];
        foreach($mapel as $item){
            MataPelajaran::create($item);
        }
    }
}
