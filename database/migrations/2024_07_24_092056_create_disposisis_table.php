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
        Schema::create('disposisi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id_pengirim')->constrained('users');
            $table->foreignId('user_id_tujuan')->constrained('users');
            $table->foreignId('surat_masuk_id')->constrained('surat_masuk');
            $table->date('tgl_disposisi')->nullable();
            $table->string('file_upload')->nullable();
            $table->text('keterangan_disposisi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('disposisi');
    }
};
