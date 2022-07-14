<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0;$i<25;$i++)
        {
            $man_infected = rand(0, 50);
            $woman_infected = rand(0, 50);

            DB::table('cases')->insert([
                'clinic_id' => $i+1,
                'year' => rand(2019, 2021),
                'man_infected' => $man_infected,
                'woman_infected' => $woman_infected,
                'man_died' => rand(0, $man_infected),
                'woman_died' => rand(0, $woman_infected),
            ]);
        }
    }
}
