<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratMasuk extends Model
{
    use HasFactory;

    protected $table = 'suratmasuk';
    protected $fillable = [
        'user_id',
        'jenissurat_id',
        'sub_level_asal_id',
        'sub_level_tujuan_id',
        'kode_surat',
        'perihal_masuk',
        'tgl_surat',
        'no_surat',
        'tgl_masuk',
        'tgl_selesai',
        'fotosuratmasuk1',
        'fotosuratmasuk2',
        'fotosuratmasuk3',
        'fotosuratmasuk4',
        'fotosuratmasuk5',
        'status_surat',
        'asal_surat',
    ];

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
