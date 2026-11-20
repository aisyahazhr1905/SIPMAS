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
        Schema::create('riwayat_status', function (Blueprint $table) {
            $table->id('id_riwayat');
            $table->unsignedBigInteger('id_pengaduan');
            $table->unsignedBigInteger('id_petugas');
            $table->enum('status', [
                'diajukan',
                'diverifikasi',
                'diproses',
                'diteruskan',
                'selesai',
                'ditolak'
            ]);
            $table->text('keterangan')->nullable();
            $table->dateTime('tgl_perubahan')->useCurrent();

            $table->foreign('id_pengaduan')
                ->references('id_pengaduan')
                ->on('pengaduan')
                ->cascadeOnDelete();

            $table->foreign('id_petugas')
                ->references('id_pengguna')
                ->on('pengguna');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat_status');
    }
};
