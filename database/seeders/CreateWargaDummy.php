<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Carbon\Carbon;

class CreateWargaDummy extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        foreach (range(1, 100) as $index) {
            DB::table('warga')->insert([
                'nik' => $faker->unique()->numerify('###########'),
                'nama' => $faker->name(),
                'jenis_kelamin' => $faker->randomElement(['L', 'P']),
                'tempat_lahir' => $faker->city(),
                'tanggal_lahir' => $faker->date('Y-m-d', '2010-12-31'),
                'agama' => $faker->randomElement(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu']),
                'pendidikan' => $faker->randomElement(['SD', 'SMP', 'SMA', 'S1', 'S2']),
                'pekerjaan' => $faker->randomElement(['Pelajar', 'Karyawan', 'PNS', 'Wiraswasta', 'Ibu Rumah Tangga', 'Petani']),
                'status_perkawinan' => $faker->randomElement(['Belum Kawin', 'Kawin', 'Cerai Hidup', 'Cerai Mati']),
                'status_dalam_keluarga' => $faker->randomElement(['Kepala Keluarga', 'Istri', 'Anak', 'Nenek', 'Kakek']),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
