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
        Schema::create('pengguna', function (Blueprint $table) {
            $table->id('id_pengguna');
            $table->string('nama_lengkap', 100);
            $table->string('nik', 16)->unique();
            $table->string('email', 100)->unique();
            $table->string('no_hp', 20);
            $table->text('alamat');
            $table->unsignedBigInteger('id_rt_rw')->nullable();
            $table->string('kata_sandi');
            $table->enum('role', ['warga', 'petugas', 'lurah', 'admin']);
            $table->enum('status_akun', ['aktif', 'nonaktif'])->default('aktif');
            $table->timestamp('tgl_dibuat')->useCurrent();

            $table->foreign('id_rt_rw')
                ->references('id_rt_rw')
                ->on('rt_rw')
                ->nullOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengguna');
    }
};
