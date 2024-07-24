<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratKeluar extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nama_penerima',
        'tgl_keluar',
        'tgl_diterima',
        'nosuratkeluar',
        'perihalkeluar',
        'tujuansuratkeluar',
        'foto_surat_keluar1',
        'foto_surat_keluar2',
        'foto_surat_keluar3',
        'foto_surat_keluar4',
        'foto_surat_keluar5',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'tgl_keluar' => 'date',
            'tgl_diterima' => 'date',
        ];
    }

    public function User()
    {
        $this->belongsTo(User::class, 'user_id');
    }
}
