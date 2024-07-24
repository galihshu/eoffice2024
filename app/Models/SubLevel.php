<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubLevel extends Model
{
    use HasFactory;
    protected $table = 'sublevel';

    protected $fillable = [
        'level_id',
        'sublevel'
    ];

    public function SubLevel(){
        return $this->belongsTo(Level::class, 'level_id');
    }
}
