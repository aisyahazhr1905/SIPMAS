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
        Schema::create('notifikasi', function (Blueprint $table) {
            $table->id('id_notifikasi');
            $table->unsignedBigInteger('id_penerima');
            $table->unsignedBigInteger('id_pengaduan');
            $table->string('jenis', 50);
            $table->text('pesan');
            $table->enum('status_baca', ['belum_dibaca', 'sudah_dibaca'])
                ->default('belum_dibaca');
            $table->dateTime('tgl_kirim')->useCurrent();

            $table->foreign('id_penerima')
                ->references('id_pengguna')
                ->on('pengguna')
                ->cascadeOnDelete();

            $table->foreign('id_pengaduan')
                ->references('id_pengaduan')
                ->on('pengaduan')
                ->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifikasi');
    }
};
