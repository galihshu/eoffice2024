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
            $table->foreignId('user_id_tujuan')->nullable()->constrained('users');
            $table->foreignId('surat_masuk_id')->constrained('surat_masuk');
            $table->enum('status_disposisi', [1,2,3,4,5])->default(1)->comment('1 = Distribusi, 2 = Disposisi, 3 = Diteruskan, 4 = Selesai, 5 = Ditolak');
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
