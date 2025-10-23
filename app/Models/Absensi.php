<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;

    /**
     * Nama tabel yang terhubung dengan model.
     */
    protected $table = 'ABSENSI';

    /**
     * Primary Key tabel.
     */
    protected $primaryKey = 'id_absensi';
    
    /**
     * Kolom-kolom yang dapat diisi secara massal (mass assignable).
     * Sesuaikan dengan atribut tabel ABSENSI.
     */
    protected $fillable = [
        'id_jadwal',
        'nis',
        'tanggal',
        'status_absensi',
        'keterangan',
        'waktu_absensi', // Jika Anda menambahkan kolom ini
    ];

    // Secara opsional, jika Anda tidak menggunakan kolom timestamps (created_at dan updated_at):
    // public $timestamps = false;

    /**
     * Atribut yang harus di-cast ke tipe data tertentu.
     */
    protected function casts(): array
    {
        return [
            'tanggal' => 'date',
            'waktu_absensi' => 'datetime', // Untuk mencatat waktu dan tanggal absensi
        ];
    }
    
    // ----------------------------------------------------
    // RELASI (Hubungan ke tabel lain)
    // ----------------------------------------------------

    /**
     * Relasi Many-to-One: Absensi (Many) BELONGS TO JadwalPelajaran (One).
     * Kolom 'id_jadwal' adalah Foreign Key.
     */
    public function jadwal()
    {
        // Absensi BELONGS TO JadwalPelajaran
        return $this->belongsTo(JadwalPelajaran::class, 'id_jadwal', 'id_jadwal');
    }

    /**
     * Relasi Many-to-One: Absensi (Many) BELONGS TO Siswa (One).
     * Kolom 'nis' adalah Foreign Key.
     */
    public function siswa()
    {
        // Absensi BELONGS TO Siswa
        return $this->belongsTo(Siswa::class, 'nis', 'nis');
    }
}