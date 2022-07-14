<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $locations = [
            [
                'distric' => 'Samarinda Ilir',
                'lat' => -0.5065400985399853,
                'lng' => 117.0906612682415
            ],
            [
                'distric' => 'Samarinda Kota',
                'lat' => -0.49395053651485926,
                'lng' => 117.14633309278192
            ],
            [
                'distric' => 'Palaran',
                'lat' => -0.5780491562827348,
                'lng' => 117.20531733359904
            ],
            [
                'distric' => 'Samarinda Utara',
                'lat' => -0.44141152188995814,
                'lng' => 117.19637043232207
            ],
            [
                'distric' => 'Sambutan',
                'lat' => -0.5056232854590085,
                'lng' => 117.185504994167
            ],
            [
                'distric' => 'Samarinda Ulu',
                'lat' => -0.4728845010113043,
                'lng' => 117.13410457906645
            ],
            [
                'distric' => 'Sungai Kunjang',
                'lat' => -0.5065400985399853,
                'lng' => 117.0906612682415
            ],
            [
                'distric' => 'Sungai Pinang',
                'lat' => -0.46051419801146837,
                'lng' => 117.18911560140117
            ],
            [
                'distric' => 'Samarinda Seberang',
                'lat' => -0.5157038285990976,
                'lng' => 117.13352989951069
            ],
            [
                'distric' => 'Loa Janan Ilir',
                'lat' => -0.5409214423508785,
                'lng' => 117.10713863567092
            ],
        ];

        $faker = Faker::create('id_ID');

        for($i=0;$i<10;$i++) {
            DB::table('patients')->insert([
                'district_id' => $i+1,
                'name' => $faker->name(),
                'address' => $faker->address(),
                // 'photo' => 'default.png',
                'phone' => $faker->phoneNumber(),
                'lat' => $locations[$i]['lat'],
                'lng' => $locations[$i]['lng'],
                'created_at' => '2021-'.sprintf('%02s', $i+1).'-01 10:00:00'
            ]);
        }
    }

    public function generateFakeLat()
    {
        $lat = -0.502106;
        $faker = Faker::create();

        return $faker->latitude(
            $min = ($lat - (rand(0,20) / 1000)),
            $max = ($lat + (rand(0,20) / 1000))
        );
    }

    public function generateFakeLng()
    {
        $lng = 117.153709;
        $faker = Faker::create();

        return $faker->longitude(
            $min = ($lng - (rand(0,20) / 1000)),
            $max = ($lng + (rand(0,20) / 1000))
        );
    }
}
