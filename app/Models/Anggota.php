<?php

namespace App\Models;

use App\Models\Peran;
use App\Models\Anggota;
use App\Models\PeranAnggota;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Anggota extends Model
{
    use HasFactory;

    protected $table = 'anggota';

    protected $fillable = [
        'nama',
    ];

    public function peran() {
        return $this->hasManyThrough(
            Peran::class,
            PeranAnggota::class,
            'id_anggota', // target ini dari Anggota ke PeranAnggota
            'id',   // target ini dari PeranAnggota ke Peran
            'id',   // kasih ini dari Anggota
            'id_peran', // kasih ini dari PeranAnggota ke Peran
        );
        
    }



}
