<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            CreateWargaDummy::class,
            CreateKeluargaKKDummy::class,
            CreateAnggotaKeluargaDummy::class,
            CreatePeristiwaKelahiranDummy::class,
            CreatePeristiwaKematianDummy::class,
            CreatePeristiwaPindahDummy::class,
        ]);
    }
}
