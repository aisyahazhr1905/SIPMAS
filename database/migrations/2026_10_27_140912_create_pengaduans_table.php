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
        Schema::create('pengaduan', function (Blueprint $table) {
            $table->id('id_pengaduan');
            $table->string('no_tiket', 30)->unique();

            $table->unsignedBigInteger('id_pelapor');
            $table->unsignedBigInteger('id_petugas_input')->nullable();
            $table->unsignedBigInteger('id_kategori');

            $table->string('judul', 150);
            $table->text('uraian');
            $table->text('lokasi_kejadian');
            $table->enum('sumber_pengaduan', ['online', 'offline']);
            $table->enum('status', [
                'diajukan',
                'diverifikasi',
                'diproses',
                'diteruskan',
                'selesai',
                'ditolak'
            ])->default('diajukan');

            $table->enum('prioritas', ['rendah', 'sedang', 'tinggi'])->default('sedang');

            $table->dateTime('tgl_pengaduan')->useCurrent();
            $table->dateTime('batas_waktu')->nullable();
            $table->dateTime('tgl_selesai')->nullable();

            $table->foreign('id_pelapor')
                ->references('id_pengguna')
                ->on('pengguna');

            $table->foreign('id_petugas_input')
                ->references('id_pengguna')
                ->on('pengguna')
                ->nullOnDelete();

            $table->foreign('id_kategori')
                ->references('id_kategori')
                ->on('kategori');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengaduan');
    }
};
