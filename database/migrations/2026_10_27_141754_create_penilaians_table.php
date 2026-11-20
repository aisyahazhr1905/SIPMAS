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
        Schema::create('penilaian', function (Blueprint $table) {
            $table->id('id_penilaian');
            $table->unsignedBigInteger('id_pengaduan');
            $table->unsignedBigInteger('id_warga');
            $table->unsignedTinyInteger('rating');
            $table->text('komentar')->nullable();
            $table->dateTime('tgl_penilaian')->useCurrent();

            $table->foreign('id_pengaduan')
                ->references('id_pengaduan')
                ->on('pengaduan')
                ->cascadeOnDelete();

            $table->foreign('id_warga')
                ->references('id_pengguna')
                ->on('pengguna');

            $table->unique('id_pengaduan');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penilaian');
    }
};
