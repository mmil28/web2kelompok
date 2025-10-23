<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    /**
     * Nama tabel yang terhubung dengan model.
     * Secara default, Laravel akan mencari 'kelas'. Kita definisikan 'KELAS'.
     */
    protected $table = 'KELAS';

    /**
     * Primary Key tabel (secara default, Laravel sudah menggunakan 'id', 
     * tapi di sini kita definisikan ulang id_kelas).
     */
    protected $primaryKey = 'id_kelas';
    
    /**
     * Kolom-kolom yang dapat diisi secara massal (mass assignable).
     * Sesuaikan dengan atribut tabel KELAS.
     */
    protected $fillable = [
        'nama_kelas',
        'tingkat',
    ];

    // Secara opsional, jika Anda tidak menggunakan kolom timestamps (created_at dan updated_at):
    // public $timestamps = false;


    // ----------------------------------------------------
    // RELASI (Hubungan ke tabel lain)
    // ----------------------------------------------------

    /**
     * Relasi One-to-Many: Kelas (One) HAS MANY Siswa (Many).
     * Kolom 'id_kelas' di tabel SISWA adalah Foreign Key.
     */
    public function siswa()
    {
        // Parameter kedua adalah FK di tabel 'SISWA', parameter ketiga adalah PK di tabel 'KELAS'
        return $this->hasMany(Siswa::class, 'id_kelas', 'id_kelas'); 
    }

    /**
     * Relasi One-to-Many: Kelas (One) HAS MANY Jadwal (Many).
     * Kolom 'id_kelas' di tabel JADWAL_PELAJARAN adalah Foreign Key.
     */
    public function jadwalPelajaran()
    {
        return $this->hasMany(JadwalPelajaran::class, 'id_kelas', 'id_kelas');
    }
}