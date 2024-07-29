<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratKeluar extends Model
{
    use HasFactory;
    protected $table = 'surat_keluar';

    protected $fillable = [
        'user_id',
        'nama_penerima',
        'kode_surat',
        'no_surat',
        'perihal',
        'tgl_keluar',
        'tgl_diterima',
        'status_surat',
        'tujuan_surat',
        'file_upload',
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
