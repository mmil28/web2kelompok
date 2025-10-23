<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; // Penting untuk Login
use Illuminate\Notifications\Notifiable;

class Guru extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Nama tabel yang terhubung dengan model.
     */
    protected $table = 'GURU';

    /**
     * Primary Key tabel.
     */
    protected $primaryKey = 'nip';
    
    /**
     * Tentukan apakah Primary Key adalah Auto-Increment (NIP biasanya bukan).
     */
    public $incrementing = false;
    
    /**
     * Tentukan tipe data Primary Key (NIP adalah string/varchar).
     */
    protected $keyType = 'string';


    /**
     * Kolom-kolom yang dapat diisi secara massal (mass assignable).
     */
    protected $fillable = [
        'nip',
        'nama_guru',
        'email',
        'password_guru',
    ];

    /**
     * Kolom-kolom yang harus disembunyikan saat serialisasi (misalnya saat mengirim respons JSON).
     * Pastikan Anda menggunakan 'password_guru' sesuai dengan nama kolom.
     */
    protected $hidden = [
        'password_guru',
        'remember_token',
    ];

    /**
     * Atribut yang harus di-cast ke tipe data tertentu.
     */
    protected function casts(): array
    {
        return [
            // Jika Anda menggunakan kolom 'password' pada saat login/otentikasi:
            // 'password_guru' => 'hashed', 
        ];
    }
    
    // ----------------------------------------------------
    // RELASI (Hubungan ke tabel lain)
    // ----------------------------------------------------

    /**
     * Relasi One-to-Many: Guru (One) HAS MANY JadwalPelajaran (Many).
     * Kolom 'nip' di tabel JADWAL_PELAJARAN adalah Foreign Key.
     */
    public function jadwalPelajaran()
    {
        return $this->hasMany(JadwalPelajaran::class, 'nip', 'nip');
    }

    // Jika Anda ingin menggunakan kolom 'password_guru' sebagai kolom otentikasi
    // Anda mungkin perlu override metode getAuthPassword() di Laravel
    public function getAuthPassword()
    {
        return $this->password_guru;
    }
}