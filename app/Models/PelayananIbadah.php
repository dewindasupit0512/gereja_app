<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PelayananIbadah extends Model
{
    use HasFactory;
    
    protected $table = "pelayanan_ibadah";

    protected $fillable = [
        'id_peran_anggota',
        'id_jadwal_ibadah',
    ];


}
