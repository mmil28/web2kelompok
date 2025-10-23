<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataPelajaran extends Model
{
    use HasFactory;

    /**
     * Nama tabel yang terhubung dengan model.
     */
    protected $table = 'MATA_PELAJARAN';

    /**
     * Primary Key tabel.
     */
    protected $primaryKey = 'id_mapel';
    
    /**
     * Kolom-kolom yang dapat diisi secara massal (mass assignable).
     * Sesuaikan dengan atribut tabel MATA_PELAJARAN.
     */
    protected $fillable = [
        'nama_mapel',
    ];

    // Secara opsional, jika Anda tidak menggunakan kolom timestamps (created_at dan updated_at):
    // public $timestamps = false;


    // ----------------------------------------------------
    // RELASI (Hubungan ke tabel lain)
    // ----------------------------------------------------

    /**
     * Relasi One-to-Many: MataPelajaran (One) HAS MANY JadwalPelajaran (Many).
     * Kolom 'id_mapel' di tabel JADWAL_PELAJARAN adalah Foreign Key.
     */
    public function jadwalPelajaran()
    {
        // Parameter kedua adalah Foreign Key, parameter ketiga adalah Primary Key
        return $this->hasMany(JadwalPelajaran::class, 'id_mapel', 'id_mapel');
    }
}