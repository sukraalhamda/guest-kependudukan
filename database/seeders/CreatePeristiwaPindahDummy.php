<?php
namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreatePeristiwaPindahDummy extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $alasan = [
            'Pekerjaan',
            'Pendidikan',
            'Mengikuti keluarga',
            'Pindah domisili',
            'Alasan kesehatan',
        ];

        $status = ['pending', 'approved', 'rejected'];

        $data = [];

        for ($i = 1; $i <= 30; $i++) {
            $data[] = [
                'warga_id'         => $i, // asumsi warga_id 1–30 sudah ada
                'tgl_pindah'       => Carbon::now()->subDays(rand(10, 800))->format('Y-m-d'),
                'alamat_tujuan'    => 'Jl. Merdeka No. ' . rand(1, 200),
                'kecamatan_tujuan' => 'Kecamatan ' . ['Sukamaju', 'Sukajadi', 'Tegalrejo', 'Pancoran'][array_rand(['Sukamaju', 'Sukajadi', 'Tegalrejo', 'Pancoran'])],
                'kabupaten_tujuan' => 'Kabupaten ' . ['Bandung', 'Sleman', 'Bogor', 'Malang'][array_rand(['Bandung', 'Sleman', 'Bogor', 'Malang'])],
                'provinsi_tujuan'  => ['Jawa Barat', 'Jawa Tengah', 'Jawa Timur', 'DKI Jakarta'][array_rand(['Jawa Barat', 'Jawa Tengah', 'Jawa Timur', 'DKI Jakarta'])],
                'negara_tujuan'    => 'Indonesia',
                'alasan'           => $alasan[array_rand($alasan)],
                'keterangan'       => 'Pindah tempat tinggal sementara',
                'status'           => $status[array_rand($status)],
                'no_surat'         => 'SKP-' . str_pad($i, 3, '0', STR_PAD_LEFT) . '/2024',
                'created_at'       => now(),
                'updated_at'       => now(),
            ];
        }

        DB::table('peristiwa_pindah')->insert($data);
    }
}
