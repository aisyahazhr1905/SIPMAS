<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('penerusan', function (Blueprint $table) {
            $table->string('jenis_tujuan', 10)->default('rt_rw')->after('id_petugas');
            $table->unsignedBigInteger('id_rt_rw')->nullable()->change();
            $table->unsignedBigInteger('id_seksi')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('penerusan', function (Blueprint $table) {
            $table->dropColumn('jenis_tujuan');
            // Kolom tujuan dibiarkan nullable agar rollback tidak gagal bila ada data kosong.
        });
    }
};
