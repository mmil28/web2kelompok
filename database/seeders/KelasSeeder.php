<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kelas;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kelas = [
            ['nama_kelas' => 'X IPA 1',  'tingkat' => '10'],
            ['nama_kelas' => 'X IPA 2',  'tingkat' => '10'],
            ['nama_kelas' => 'X IPS 1',  'tingkat' => '10'],
            ['nama_kelas' => 'XI IPA 1', 'tingkat' => '11'],
            ['nama_kelas' => 'XI IPA 2', 'tingkat' => '11'],
            ['nama_kelas' => 'XI IPS 1', 'tingkat' => '11'],
            ['nama_kelas' => 'XII IPA 1','tingkat' => '12'],
            ['nama_kelas' => 'XII IPA 2','tingkat' => '12'],
            ['nama_kelas' => 'XII IPS 1','tingkat' => '12'],
        ];
        foreach ($kelas as $item) {
            Kelas::create($item);
        }
    }
}
