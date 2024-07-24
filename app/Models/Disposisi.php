<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disposisi extends Model
{
    use HasFactory;

    protected $table ='disposisi';

    protected $fillable = [
        'user_id',
        'suratmasuk_id',
        'tgl_disposisi',
        'sub_level_asal_id',
        'sub_level_tujuan_id',
        'foto_disposisi',
        'keterangan_disposisi'
    ];

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function SuratMasuk()
    {
        return $this->belongsTo(SuratMasuk::class, 'suratmasuk_id');
    }

    public function SubLevelAsal()
    {
        return $this->belongsTo(SubLevel::class, 'sub_level_asal_id');
    }

    public function SubLevelTujuan()
    {
        return $this->belongsTo(SubLevel::class, 'sub_level_tujuan_id');
    }
}
