<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeristiwaKelahiran extends Model
{
    use HasFactory;

    protected $table = 'peristiwa_kelahiran';
    protected $primaryKey = 'kelahiran_id';

    protected $fillable = [
        'warga_id',
        'tgl_lahir',
        'tempat_lahir',
        'ayah_warga_id',
        'ibu_warga_id',
        'no_akta',
    ];
}
