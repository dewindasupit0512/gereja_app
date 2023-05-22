<?php

namespace App\Models;

use App\Models\Peran;
use App\Models\Ibadah;
use App\Models\Jemaat;
use App\Models\PeranAnggota;
use App\Models\JadwalGenerate;
use App\Models\PelayananIbadah;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JadwalIbadah extends Model
{
    use HasFactory;

    protected $table = "jadwal_ibadah";

    protected $fillable = [
        'waktu',
        'generate_id',
        'tempat_ibadah',
    ];

    public function lokasi()
    {
        return $this->hasOne(Jemaat::class, 'id', 'tempat_ibadah');
    }

    public function pelayanan_ibadah() {
        return $this->hasMany(PelayananIbadah::class, 'id_jadwal_ibadah', 'id');
    }

    public function peran_anggota()
    {
        return $this->hasManyThrough(
            PeranAnggota::class,
            PelayananIbadah::class,
            'id_jadwal_ibadah',
            'id',
            'id',
            'id_peran_anggota',
        );
    }

    public function ibadah()
    {
        return $this->hasOneThrough(
            Ibadah::class,
            JadwalGenerate::class,
            'id',
            'id',
            'generate_id',
            'ibadah_id',
        );
    }

}
