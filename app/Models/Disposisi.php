<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disposisi extends Model
{
    use HasFactory;

    protected $table ='disposisi';

    protected $fillable = [
        'user_id_pengirim',
        'user_id_tujuan',
        'surat_masuk_id',
        'tgl_disposisi',
        'jabatan_asal_id',
        'file_upload',
        'keterangan_disposisi'
    ];

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id_pengirim');
    }

    public function SuratMasuk()
    {
        return $this->belongsTo(SuratMasuk::class, 'surat_masuk_id');
    }

    public function UserTujuan()
    {
        return $this->belongsTo(User::class, 'user_id_tujuan');
    }

}
