<?php

namespace App\Models;

use App\Models\Ibadah;
use App\Models\JadwalIbadah;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JadwalGenerate extends Model
{
    use HasFactory;

    protected $table = "jadwal_generates";

    protected $fillable = [
        "active_status",
        "ibadah_id",
    ];

    public function ibadah()
    {
        return $this->hasOne(Ibadah::class, 'id', 'ibadah_id');
    }

    public function jadwal_ibadah()
    {
        return $this->hasMany(JadwalIbadah::class, 'generate_id', 'id');
    }
    

}
