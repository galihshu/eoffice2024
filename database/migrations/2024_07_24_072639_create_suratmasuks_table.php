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
        Schema::create('suratmasuk', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('jenissurat_id')->constrained('jenissurat');
            $table->foreignId('sub_level_asal_id')->constrained('jenissurat');
            $table->foreignId('sub_level_tujuan_id')->constrained('jenissurat');
            $table->string('kode_surat');
            $table->string('perihal_masuk');
            $table->date('tgl_surat')->nullable();
            $table->string('no_surat')->nullable();
            $table->date('tgl_masuk')->nullable();
            $table->date('tgl_selesai')->nullable();
            $table->string('foto_surat_masuk1')->nullable();
            $table->string('foto_surat_masuk2')->nullable();
            $table->string('foto_surat_masuk3')->nullable();
            $table->string('foto_surat_masuk4')->nullable();
            $table->string('foto_surat_masuk5')->nullable();
            $table->string('status_surat', 50)->nullable();
            $table->text('asal_surat')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suratmasuks');
    }
};
