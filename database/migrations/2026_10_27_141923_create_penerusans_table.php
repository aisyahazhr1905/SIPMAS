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
        Schema::create('penerusan', function (Blueprint $table) {
            $table->id('id_penerusan');
            $table->unsignedBigInteger('id_pengaduan');
            $table->unsignedBigInteger('id_petugas');
            $table->unsignedBigInteger('id_rt_rw');
            $table->unsignedBigInteger('id_seksi');
            $table->text('catatan')->nullable();
            $table->dateTime('tgl_penerusan')->useCurrent();

            $table->foreign('id_pengaduan')
                ->references('id_pengaduan')
                ->on('pengaduan')
                ->cascadeOnDelete();

            $table->foreign('id_petugas')
                ->references('id_pengguna')
                ->on('pengguna');

            $table->foreign('id_rt_rw')
                ->references('id_rt_rw')
                ->on('rt_rw');

            $table->foreign('id_seksi')
                ->references('id_seksi')
                ->on('seksi');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penerusan');
    }
};
