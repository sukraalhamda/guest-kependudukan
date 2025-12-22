<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PeristiwaPindah extends Model
{
    protected $table      = 'peristiwa_pindah';
    protected $primaryKey = 'pindah_id';

    protected $fillable = [
        'warga_id',
        'tgl_pindah',
        'alamat_tujuan',
        'kecamatan_tujuan',
        'kabupaten_tujuan',
        'provinsi_tujuan',
        'negara_tujuan',
        'alasan',
        'keterangan',
        'status',
        'no_surat',
    ];

    // Relasi ke Warga
    public function warga()
    {
        return $this->belongsTo(Warga::class, 'warga_id', 'warga_id');
    }

    // Relasi ke Media
    public function media()
    {
        return $this->hasMany(Media::class, 'ref_id', 'pindah_id')
            ->where('ref_table', 'peristiwa_pindah')
            ->orderBy('sort_order', 'asc');
    }
}
