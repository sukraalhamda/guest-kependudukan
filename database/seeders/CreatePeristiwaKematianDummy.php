<?php
namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreatePeristiwaKematianDummy extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sebabKematian = [
            'Sakit jantung',
            'Stroke',
            'Usia lanjut',
            'Gagal ginjal',
            'Hipertensi',
            'Kecelakaan lalu lintas',
            'Infeksi paru-paru',
        ];

        $lokasi = [
            'RSUD Dr. Soetomo Surabaya',
            'RSUP Dr. Sardjito Yogyakarta',
            'RSUD Kota Bandung',
            'RS Cipto Mangunkusumo Jakarta',
            'RSUD Kota Semarang',
            'RSUD Kabupaten Sleman',
            'Rumah duka keluarga',
        ];

        $data = [];

        for ($i = 1; $i <= 30; $i++) {
            $data[] = [
                'warga_id'      => $i, // asumsi warga_id sudah ada
                'tgl_meninggal' => Carbon::now()->subDays(rand(30, 1000))->format('Y-m-d'),
                'sebab'         => $sebabKematian[array_rand($sebabKematian)],
                'lokasi'        => $lokasi[array_rand($lokasi)],
                'no_surat'      => 'SKM-' . str_pad($i, 3, '0', STR_PAD_LEFT) . '/2024',
            ];
        }

        DB::table('peristiwa_kematian')->insert($data);
    }
}
