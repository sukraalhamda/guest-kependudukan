<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Carbon\Carbon;

class CreateAnggotaKeluargaDummy extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        $kkIds = DB::table('keluarga_kk')->pluck('kk_id')->toArray();
        $wargaIds = DB::table('warga')->pluck('warga_id')->toArray();

        foreach ($kkIds as $kk_id) {
            // Ambil kepala keluarga dari tabel keluarga_kk
            $kepala = DB::table('keluarga_kk')->where('kk_id', $kk_id)->value('kepala_keluarga_warga_id');

            // Tambah kepala keluarga ke tabel anggota_keluarga
            DB::table('anggota_keluarga')->insert([
                'kk_id' => $kk_id,
                'warga_id' => $kepala,
                'hubungan' => 'Kepala Keluarga',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            // Tambahkan anggota keluarga lainnya
            foreach (range(1, rand(1, 100)) as $i) {
                $anggota = $faker->randomElement($wargaIds);
                if ($anggota != $kepala) {
                    DB::table('anggota_keluarga')->insert([
                        'kk_id' => $kk_id,
                        'warga_id' => $anggota,
                        'hubungan' => $faker->randomElement(['Istri', 'Anak', 'Nenek', 'Kakek']),
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ]);
                }
            }
        }
    }
}
