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
            $table->string('no_surat')->nullable();
            // 1 = Baru, 2 = Proses, 3 = Selesai
            $table->enum('status_surat', [1,2,3])->default(1);
            $table->string('perihal_masuk');
            $table->date('tgl_surat')->nullable();
            $table->date('tgl_masuk')->nullable();
            $table->date('tgl_selesai')->nullable();
            $table->string('file_upload')->nullable();
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
