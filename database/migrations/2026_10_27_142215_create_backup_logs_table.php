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
        Schema::create('backup_log', function (Blueprint $table) {
            $table->id('id_backup');
            $table->unsignedBigInteger('id_admin');
            $table->string('jenis_proses', 50);
            $table->string('nama_berkas', 255);
            $table->dateTime('tgl_proses')->useCurrent();

            $table->foreign('id_admin')
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
        Schema::dropIfExists('backup_log');
    }
};
