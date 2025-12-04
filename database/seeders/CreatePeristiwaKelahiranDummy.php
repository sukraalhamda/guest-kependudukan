<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Carbon\Carbon;

class CreatePeristiwaKelahiranDummy extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        // Ambil semua warga_id
        $wargaIds = DB::table('warga')->pluck('warga_id')->toArray();

        foreach (range(1, 100) as $i) {

            // pilih anak
            $anak = $faker->randomElement($wargaIds);

            // pilih ayah dan ibu
            $ayah = $faker->randomElement($wargaIds);
            $ibu = $faker->randomElement($wargaIds);

            DB::table('peristiwa_kelahiran')->insert([
                'warga_id'          => $anak,
                'tgl_lahir'         => $faker->date(),
                'tempat_lahir'      => $faker->city(),
                'ayah_warga_id'     => $ayah,
                'ibu_warga_id'      => $ibu,
                'no_akta'           => $faker->unique()->numerify('AKTA###-####'),
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ]);
        }
    }
}
