<?php

namespace App\Models;

use App\Models\Peran;
use App\Models\Anggota;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PeranAnggota extends Model
{
    use HasFactory;

    protected $table = 'peran_anggota';

    protected $fillable = [
        'id_anggota',
        'id_peran',
    ];

    public function anggota()
    {
        return $this->hasOne(Anggota::class, 'id', 'id_anggota');
    }

    public function peran()
    {
        return $this->hasOne(Peran::class, 'id', 'id_peran');
    }
}
