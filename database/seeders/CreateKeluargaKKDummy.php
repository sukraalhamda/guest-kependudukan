<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Carbon\Carbon;

class CreateKeluargaKKDummy extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        // Ambil semua warga_id yang sudah ada dari tabel warga
        $wargaIds = DB::table('warga')->pluck('warga_id')->toArray();

        foreach (range(1, 30) as $index) {
            $kepalaKeluarga = $faker->randomElement($wargaIds);

            DB::table('keluarga_kk')->insert([
                'kk_nomor' => $faker->unique()->numerify('#########'),
                'kepala_keluarga_warga_id' => $kepalaKeluarga,
                'alamat' => $faker->streetAddress(),
                'rt' => str_pad($faker->numberBetween(1, 10), 2, '0', STR_PAD_LEFT),
                'rw' => str_pad($faker->numberBetween(1, 5), 2, '0', STR_PAD_LEFT),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
