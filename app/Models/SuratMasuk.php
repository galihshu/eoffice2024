<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratMasuk extends Model
{
    use HasFactory;

   
    use HasFactory;

    // Menetapkan nama tabel jika bukan nama konvensi
    protected $table = 'suratmasuk';

    // Atribut yang dapat diisi secara massal
    protected $fillable = [
        'user_id',
        'jenissurat_id',
        'no_surat',
        'status_surat',
        'perihal_masuk',
        'tgl_surat',
        'tgl_masuk',
        'tgl_selesai',
        'file_upload',  // Menyimpan path file yang diupload
        'asal_surat',
    ];

    // Jika Anda ingin menggunakan timestamp, aktifkan ini
    public $timestamps = true;

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function Jenis()
    {
        return $this->belongsTo(JenisSurat::class, 'jenissurat_id');
    }

    public function SubLevelAsal()
    {
        return $this->belongsTo(SubLevel::class, 'sub_level_asal_id');
    }

    public function SubLevelTujuan()
    {
        return $this->belongsTo(SubLevel::class, 'sub_level_tujuan_id');
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
