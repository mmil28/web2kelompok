<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('absensi', function (Blueprint $table) {
            $table->id();
            $table->integer('id_absensi')->unique();
            $table->foreignId('id_jadwal')->constrained('jadwal_pelajaran')->onDelete('cascade');
            $table->unsignedBigInteger('nis');
            $table->foreign('nis')->references('nis')->on('siswa')->onDelete('cascade');
            $table->date('tanggal');
            $table->time('waktu_absen');
            $table->enum('status_absen', ['H', 'S', 'I']);
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
