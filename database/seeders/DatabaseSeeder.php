<?php

namespace Database\Seeders;

use App\Models\District;
use Illuminate\Database\Seeder;

use Database\Seeders\DistrictSeeder;
use Database\Seeders\PatientSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\PageSeeder;
use Database\Seeders\ClinicsSeeder;
use Database\Seeders\CaseSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            DistrictSeeder::class,
            ClinicsSeeder::class,
            CaseSeeder::class,
            UserSeeder::class,
            PageSeeder::class
        ]);
    }
}
