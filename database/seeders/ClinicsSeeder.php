<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ClinicsSeeder extends Seeder
{
    private $clinics;

    public function __construct()
    {
        $clinics = [
            [
                'name' => 'Palaran',
                'district_id' => 3,
                'address' => 'Jl. Kesehatan, Rw. Makmur, Kec. Palaran, Kota Samarinda, Kalimantan Timur 75243',
                'lat' => -0.5572040482691192,
                'lng' => 117.18232154313056,
            ],
            [
                'name' => 'Bantuas',
                'district_id' => 3,
                'address' => 'Jl. Dr. Wahidin No.12, Bantuas, Kec. Palaran, Kota Samarinda, Kalimantan Timur 75267',
                'lat' => -0.6576496338367009,
                'lng' => 117.2331555124193,
            ],
            [
                'name' => 'Bukuan',
                'district_id' => 3,
                'address' => 'Jl. Manggis No.RT 09, Bukuan, Kec. Palaran, Kota Samarinda, Kalimantan Timur 75256',
                'lat' => -0.5750715185536565,
                'lng' => 117.20054278173559,
            ],
            [
                'name' => 'Mangkupalas',
                'district_id' => 9,
                'address' => 'Jl. Mas Penghulu No.67, Mesjid, Kec. Samarinda Seberang, Kota Samarinda, Kalimantan Timur 75133',
                'lat' => -0.5172625180534728,
                'lng' => 117.14892564125405,
            ],
            [
                'name' => 'BAQA',
                'district_id' => 9,
                'address' => 'Jl. La Madu Keleng No.106, Baqa, Kec. Samarinda Seberang, Kota Samarinda, Kalimantan Timur 75132',
                'lat' => -0.5099807325341242,
                'lng' => 117.14183466824147,
            ],
            [
                'name' => 'Harapan Baru',
                'district_id' => 1,
                'address' => 'Jl. Kurnia Makmur No.45, Harapan Baru, Kec. Loa Janan Ilir, Kota Samarinda, Kalimantan Timur 75243',
                'lat' => -0.5428105026374794,
                'lng' => 117.10479541057099,
            ],
            [
                'name' => 'Trauma Center',
                'district_id' => 1,
                'address' => 'Jl. Cipto Mangunkusumo, Simpang Tiga, Kec. Loa Janan Ilir, Kota Samarinda, Kalimantan Timur 75131',
                'lat' => -0.5662550749036693,
                'lng' => 117.08776495474804,
            ],
            [
                'name' => 'Loa Bakung',
                'district_id' => 7,
                'address' => 'Jl. Jakarta No.18, Loa Bakung, Kec. Sungai Kunjang, Kota Samarinda, Kalimantan Timur 75243',
                'lat' => -0.5289589887945099,
                'lng' => 117.09112578173534,
            ],
            [
                'name' => 'Karang Asam',
                'district_id' => 7,
                'address' => 'Jl. Untung Suropati No.31, Karang Asam Ulu, Kec. Sungai Kunjang, Kota Samarinda, Kalimantan Timur 75243',
                'lat' => -0.528558033372024,
                'lng' => 117.11242287748144,
            ],
            [
                'name' => 'Lok Bahu',
                'district_id' => 7,
                'address' => 'Jl. Ring Road, Lok Bahu, Kec. Sungai Kunjang, Kota Samarinda, Kalimantan Timur 75243',
                'lat' => -0.49328835930987674,
                'lng' => 117.08608149522901,
            ],
            [
                'name' => 'Wonorejo',
                'district_id' => 7,
                'address' => 'Jl. Cendana, Tlk. Lerong Ulu, Kec. Sungai Kunjang, Kota Samarinda, Kalimantan Timur 75127',
                'lat' => -0.4976121595886742,
                'lng' => 117.12532739440582,
            ],
            [
                'name' => 'Juanda',
                'district_id' => 6,
                'address' => 'JL. Salak, Komplek Perumnas, Air Hitam, Kec. Samarinda Ulu, Kota Samarinda, Kalimantan Timur 75243',
                'lat' => -0.47455357335790227,
                'lng' => 117.13486342406432,
            ],
            [
                'name' => 'Air Putih',
                'district_id' => 6,
                'address' => 'Jl. Pangeran Suryanata, Air Putih, Kec. Samarinda Ulu, Kota Samarinda, Kalimantan Timur 75243',
                'lat' => -0.47424757334769774,
                'lng' => 117.12192151241855,
            ],
            [
                'name' => 'Segiri',
                'district_id' => 6,
                'address' => 'Jl. Ramania 2, Sidodadi, Kec. Samarinda Ulu, Kota Samarinda, Kalimantan Timur 75243',
                'lat' => -0.47788474577164014,
                'lng' => 117.14380579522891,
            ],
            [
                'name' => 'Pasundan',
                'district_id' => 6,
                'address' => 'Jl. Pasundan No.11, Jawa, Kec. Samarinda Ulu, Kota Samarinda, Kalimantan Timur 75243',
                'lat' => -0.49520790249783453,
                'lng' => 117.1375604663936,
            ],
            [
                'name' => 'Samarinda Kota',
                'district_id' => 2,
                'address' => 'Jl. Bhayangkara No.4, Bugis, Kec. Samarinda Kota, Kota Samarinda, Kalimantan Timur 75121',
                'lat' => -0.49540933189820513,
                'lng' => 117.14422939097493
            ],
            [
                'name' => 'Sidomulyo',
                'district_id' => 1,
                'address' => 'Jl. Jelawat Gg. VI, Sidodamai, Kec. Samarinda Ilir, Kota Samarinda, Kalimantan Timur 75115',
                'lat' => -0.5005860605479101,
                'lng' => 117.16111581057075,
            ],
            [
                'name' => 'Sungai Kapih',
                'district_id' => 5,
                'address' => 'Jl. Wijaya, Sambutan, Sungai Kapih, Samarinda, Kota Samarinda, Kalimantan Timur 75251',
                'lat' => -0.5317527618924967,
                'lng' => 117.16928008358344,
            ],
            [
                'name' => 'Sambutan',
                'district_id' => 5,
                'address' => 'Jl. Pelita 6, Sambutan, Kec. Sambutan, Kota Samarinda, Kalimantan Timur 75253',
                'lat' => -0.5134949894993317,
                'lng' => 117.19908508173535,
            ],
            [
                'name' => 'Makroman',
                'district_id' => 5,
                'address' => 'Jl. Sekolahan, Makroman, Kec. Sambutan, Kota Samarinda, Kalimantan Timur 75251',
                'lat' => -0.5567825746497974,
                'lng' => 117.22420726213967,
            ],
            [
                'name' => 'Bengkuring',
                'district_id' => 4,
                'address' => 'Deretan Ruko Lama, Jl. Bengkuring Raya, Sempaja Sel., Kec. Samarinda Utara, Kota Samarinda, Kalimantan Timur 75119',
                'lat' => -0.4299827484797462,
                'lng' =>  117.15827783806229,
            ],
            [
                'name' => 'Sempaja',
                'district_id' => 4,
                'address' => 'Jl. Wahid Hasyim I, Sempaja Sel., Kec. Samarinda Utara, Kota Samarinda, Kalimantan Timur 75243',
                'lat' => -0.4511593151109362,
                'lng' => 117.15417118543101,
            ],
            [
                'name' => 'Sungai Siring',
                'district_id' => 4,
                'address' => 'Jl. A. Yani, Sungai Siring, Kec. Samarinda Utara, Kota Samarinda, Kalimantan Timur 75119',
                'lat' => -0.39160012809998684,
                'lng' => 117.259002524064,
            ],
            [
                'name' => 'Lempake',
                'district_id' => 4,
                'address' => 'Jalan D.I. Panjaitan,kebun agung no.1 Kecamatan Samarinda Utara, Kota Samarinda, Kalimantan Timur 75113, Lempake, Kec. Samarinda Utara, Kota Samarinda, Kalimantan Timur 75113',
                'lat' => -0.4543188296932827,
                'lng' => 117.19048217008937,
            ],
            [
                'name' => 'Remaja',
                'district_id' => 8,
                'address' => 'Jl. Mayor Jendral Sutoyo, Sungai Pinang Dalam, Kec. Sungai Pinang, Kota Samarinda, Kalimantan Timur 75117',
                'lat' => -0.47536320185122477,
                'lng' => 117.164787139406,
            ],
            [
                'name' => 'Temindung',
                'district_id' => 8,
                'address' => 'Jl. Pelita, Sungai Pinang Dalam, Kec. Sungai Pinang, Kota Samarinda, Kalimantan Timur 75117',
                'lat' => -0.4850805168115552,
                'lng' => 117.16434526824156,
            ],
        ];

        $this->clinics = $clinics;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach($this->clinics as $clinic)
        {
            DB::table('clinics')->insert([
                'district_id' => $clinic['district_id'],
                'name' => $clinic['name'],
                'address' => $clinic['address'],
                'lat' => $clinic['lat'],
                'lng' => $clinic['lng']
            ]);
        }
    }
}
