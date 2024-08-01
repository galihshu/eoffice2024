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
        Schema::create('surat_masuk', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('jenis_surat_id')->constrained('jenis_surat');
            $table->string('no_surat')->nullable();
            $table->string('perihal')->nullable();
            $table->enum('status_surat', [1,2,3,4,5,6])->default(1)->comment('1 = Baru, 2 = Diproses, 3 = Disposisi, 4 = Selesai, 5 = Ditolak, 6 = Diarsipkan');
            $table->date('tgl_surat')->nullable();
            $table->date('tgl_masuk')->nullable();
            $table->date('tgl_selesai')->nullable();
            $table->text('asal_surat')->nullable();
            $table->string('file_upload')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_masuk');
    }
};
