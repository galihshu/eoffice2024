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
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('suratmasuk_id')->constrained('suratmasuk');
            $table->date('tgl_disposisi')->nullable();
            $table->foreignId('jabatan_asal_id')->constrained('jabatan');
            $table->foreignId('jabatan_tujuan_id')->constrained('jabatan');
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
