<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeristiwaKelahiran extends Model
{
    use HasFactory;

    protected $table      = 'peristiwa_kelahiran';
    protected $primaryKey = 'kelahiran_id';

    protected $fillable = [
        'warga_id',
        'tgl_lahir',
        'tempat_lahir',
        'ayah_warga_id',
        'ibu_warga_id',
        'no_akta',
    ];

    public function media()
    {
        return $this->hasMany(Media::class, 'ref_id', 'kelahiran_id')
            ->where('ref_table', 'peristiwa_kelahiran')
            ->orderBy('sort_order', 'asc');
    }
}
