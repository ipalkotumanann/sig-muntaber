<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\District;
use App\Models\Cases;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class MapController extends Controller
{
    public function index()
    {
        return view('home.pages.map', [
            'districts' => District::get()
        ]);
    }

    public function fetch(Request $request)
    {
        $year = $request->get('year');
        $district = $request->get('district');

        $districs = District::with([
                            'clinics.cases' => function($q) use($year) {
                                return $q->where('year', isset($year) ? $year : date('Y'));
                            }
                        ]);

        if(isset($district) && $district !== 'null') {
            $districs = $districs->where('id', $district);
            //dd('');
        }

        $districs = $districs->get();

        $prepared = [
            'type' => 'FeatureCollection',
            'features' => []
        ];

        $clinics = [];

        foreach($districs as $distric)
        {
            //dd($districs[2]->clinics->sum('jumlah_penduduk'));
            $total_infected = 0;
            $cfrTotal = 0;
            foreach ($distric->clinics as $clinic)
            {
                if(!$clinic->cases->isEmpty()){
                    foreach ($clinic->cases as $item){
                        $distric->id == $clinic->districts_id
                            ? $total_infected += $item->total_infected
                            : $total_infected = $total_infected;
                    }

                    $clinic['cfr_total'] = round(($clinic->cases->sum('total_infected')/$clinic->jumlah_penduduk)*100,2);
                    //dd($clinic);
                    array_push($clinics, $clinic);
                }
//                if ($total_cases = count($clinic->cases) >= 1)
//                {
//                    for($i=0; $i<$total_cases; $i++)
//                    {
//                        $distric['id'] == $clinic->district_id
//                            ? $total_infected += $clinic->cases[$i]->total_infected
//                            : $total_infected = $total_infected;
//                    }
//
//                    // $clinic_detail = Arr::pluck($clinic, 'name', 'address', 'lat', 'lng');
//                    array_push($clinics, $clinic);
//                }
            }
            if($distric->jumlah_penduduk != 0){
                $cfrTotal = round(($total_infected/$distric->jumlah_penduduk)* 100,2);
            }
            $feature = [
                'type' => 'Feature',
                'id' => Str::uuid(),
                'properties' => [
                    'name' => $distric->name,
                    'status' => $distric->status,
                    'total_infected' => $total_infected,
                    'jumlah_penduduk' => $distric->jumlah_penduduk,
                    'cfr_total' => $cfrTotal
                ],
                'geometry' => $distric->geometry,
            ];

            array_push($prepared['features'], $feature);
        }


        //dd($clinics);
        $data = [
            'clinics' => $clinics,
            'districts' => $prepared
        ];

        return $data;
    }

    public function stats()
    {
        Carbon::setLocale('id');

        $cases = Cases::groupBy('year')
            ->orderBy('year', 'ASC')
            ->selectRaw('
                SUM(all_ages + toddler) total,
                all_ages,toddler,
                year
            ')
            ->whereNull('deleted_at')
            ->get()
            ->makeHidden([
                'total_infected'
            ]);


        $labels     = Arr::pluck($cases, 'year');
        $died       = Arr::pluck($cases, 'all_ages');
        $toddler       = Arr::pluck($cases, 'toddler');
        $total      = Arr::pluck($cases, 'total');

        $year = date('Y');

        $data = [
            'labels' => [],
            'died' => [],
            'total' => []
        ];

        // for($y = $year - 10; $y <= $year; $y++) {
        for ($i=$labels[0]; $i<= end($labels); $i++){
            $data['labels'][]= (string) $i;

            $key =array_search($i,$labels);
            if($key !== false) {
                $data['died'][] = $died[$key];
                $data['total'][] = $total[$key];
            }
            else {
                $data['died'][] = 0;
                $data['total'][] = 0;
            }
        }

        //return $data;

        return [
            'labels' => $labels,
            'died' => $died,
            'toddler' => $toddler,
            'total' => $total,
        ];
    }
}
