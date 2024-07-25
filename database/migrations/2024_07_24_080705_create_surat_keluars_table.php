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
            $table->text('nama_penerima')->nullable();
            $table->string('nosuratkeluar');
            $table->string('perihalkeluar');
            $table->date('tgl_keluar')->nullable();
            $table->date('tgl_diterima')->nullable();
            $table->string('tujuansuratkeluar')->nullable();
            $table->string('foto_surat_keluar1')->nullable();
            $table->string('foto_surat_keluar2')->nullable();
            $table->string('foto_surat_keluar3')->nullable();
            $table->string('foto_surat_keluar4')->nullable();
            $table->string('foto_surat_keluar5')->nullable();
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
