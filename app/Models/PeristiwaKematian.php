<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeristiwaKematian extends Model
{
    use HasFactory;

    protected $table      = 'peristiwa_kematian';
    protected $primaryKey = 'kematian_id';

    protected $fillable = [
        'warga_id',
        'tgl_meninggal',
        'sebab',
        'lokasi',
        'no_surat',
    ];

    public function media()
    {
        return $this->hasMany(Media::class, 'ref_id', 'kematian_id')
            ->where('ref_table', 'peristiwa_kematian')
            ->orderBy('sort_order', 'asc');
    }

    public function warga()
    {
        return $this->belongsTo(warga::class, 'warga_id', 'warga_id');
    }
}
