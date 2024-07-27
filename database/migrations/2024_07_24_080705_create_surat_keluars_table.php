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
        Schema::create('surat_keluar', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('nama_penerima')->nullable();
            $table->string('kode_surat');
            $table->string('no_surat');
            $table->string('perihal')->nullable();
            $table->date('tgl_keluar')->nullable();
            $table->date('tgl_diterima')->nullable();
            // 1 = Baru, 2 = Proses, 3 = Selesai
            $table->enum('status_surat', [1,2,3])->default(1);
            $table->string('tujuan_surat')->nullable();
            $table->string('file_upload')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_keluar');
    }
};
