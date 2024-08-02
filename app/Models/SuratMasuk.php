<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratMasuk extends Model
{
    use HasFactory;

   
    use HasFactory;

    // Menetapkan nama tabel jika bukan nama konvensi
    protected $table = 'surat_masuk';

    // Atribut yang dapat diisi secara massal
    protected $fillable = [
        'user_id',
        'jenis_surat_id',
        'no_surat',
        'status_surat',
        'perihal',
        'tgl_surat',
        'tgl_masuk',
        'tgl_selesai',
        'asal_surat',
        'file_upload',  // Menyimpan path file yang diupload
    ];

    // Jika Anda ingin menggunakan timestamp, aktifkan ini
    public $timestamps = true;

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function Jenis()
    {
        return $this->belongsTo(JenisSurat::class, 'jenis_surat_id');
    }

    public function Disposisi(){
        return $this->hasMany(Disposisi::class, 'surat_masuk_id');
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'tgl_surat' => 'date',
            'tgl_masuk' => 'date',
            'tgl_selesai' => 'date',
        ];
    }
    
}
