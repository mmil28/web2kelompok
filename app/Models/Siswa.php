<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; // Gunakan Authenticatable jika Siswa bisa login
use Illuminate\Notifications\Notifiable;

// Jika siswa akan digunakan untuk otentikasi (login), gunakan 'Authenticatable'.
// Jika hanya untuk data, gunakan 'Model'.
class Siswa extends Authenticatable 
{
    use HasFactory, Notifiable;

    /**
     * Nama tabel yang terhubung dengan model.
     * Secara default, Laravel akan mencari 'siswas'. Kita harus definisikan 'SISWA'.
     */
    protected $table = 'SISWA';

    /**
     * Tentukan Primary Key yang digunakan (bukan 'id' default).
     */
    protected $primaryKey = 'nis';

    /**
     * Tentukan apakah Primary Key adalah Auto-Increment (NIS biasanya bukan).
     */
    public $incrementing = false;
    
    /**
     * Tentukan tipe data Primary Key (NIS adalah string/varchar).
     */
    protected $keyType = 'string';


    /**
     * Kolom-kolom yang dapat diisi secara massal (mass assignable).
     * Sesuaikan dengan atribut tabel SISWA.
     */
    protected $fillable = [
        'nis',
        'id_kelas',
        'nama_siswa',
        'tempat_lahir',
        'tgl_lahir',
        'alamat',
        'jenis_kelamin',
        'password_siswa', // Meskipun ini password, Laravel mengharuskan kita memasukkannya
    ];

    /**
     * Kolom-kolom yang harus disembunyikan saat serialisasi (misalnya saat mengirim respons JSON).
     */
    protected $hidden = [
        'password_siswa',
        // Jika Anda menggunakan kolom 'remember_token' di tabel SISWA, tambahkan di sini
    ];

    /**
     * Atribut yang harus di-cast ke tipe data tertentu.
     */
    protected function casts(): array
    {
        return [
            'tgl_lahir' => 'date',
            // Laravel secara otomatis akan melakukan hashing pada 'password_siswa' saat otentikasi, 
            // namun jika Anda ingin casting secara spesifik:
            // 'password_siswa' => 'hashed', 
        ];
    }

    // ----------------------------------------------------
    // RELASI (Hubungan ke tabel lain)
    // ----------------------------------------------------

    /**
     * Relasi One-to-Many: Siswa (Many) BELONGS TO Kelas (One).
     * Kolom 'id_kelas' di tabel SISWA adalah Foreign Key.
     */
    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas', 'id_kelas');
    }

    /**
     * Relasi One-to-Many: Siswa (One) HAS MANY Absensi (Many).
     * Kolom 'nis' di tabel ABSENSI adalah Foreign Key.
     */
    public function absensi()
    {
        return $this->hasMany(Absensi::class, 'nis', 'nis');
    }
}