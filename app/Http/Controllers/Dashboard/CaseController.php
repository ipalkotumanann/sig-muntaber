<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Support\Arr;
use App\Models\Cases;
use App\Http\Controllers\Controller;
use App\Models\Clinic;
use Illuminate\Http\Request;

class CaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $params = $request->query->all();

        $cases = Cases::with('clinic')
                    ->where('year', isset($params['year']) ? $params['year'] : date('Y'))
                    ->orderBy('created_at', 'desc')
                    ->paginate(10);

        $links = [
            'create' => [
                'label' => 'Tambah Kasus',
                'href' => 'dashboard.case.create'
            ],
            'update' => [
                'href' => 'dashboard.case.edit'
            ],
            'delete' => [
                'href' => 'dashboard.case.delete'
            ],
        ];

        $data = [
            'cases' => $cases,
            'links' => $links
        ];

        return view(
            'dashboard.pages.dashboard.case.index',
            $data
        );
    }

    public function fetch($year)
    {
        // $cases = Cases::where('year', $year)
        //             ->get()
        //             ->toArray();

        // $clinicsId  = Arr::pluck($cases, 'clinic_id');
        // $clinics    = Clinic::whereNotIn('id', $clinicsId)
        $clinics    = Clinic::get();

        return $clinics;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clinics = Clinic::get();

        return view(
            'dashboard.pages.dashboard.case.create',
            ['clinics' => $clinics]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $case = [
            'clinics_id' => $request->clinic,
            'year' => $request->year,
            'toddler' => $request->toddler,
            'all_ages' => $request->all_ages
        ];
        //$case = $request->all();

        Cases::create($case);

        return back()
            ->with('callback', [
                'caption' => 'Kasus berhasil ditambah',
                'title' => 'Berhasil',
                'icon' => 'success',
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clinics = Clinic::get();
        $case = Cases::find($id);

        return view(
            'dashboard.pages.dashboard.case.edit',
            [
                'clinics' => $clinics,
                'case' => $case,
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $case = Cases::find($id);

        $case->clinic_id = $request->clinic;
        $case->toddler = $request->toddler;
        $case->all_ages = $request->all_ages;

        $case->update();

        return back()
            ->with('callback', [
                'caption' => 'Kasus berhasil diubah',
                'title' => 'Berhasil',
                'icon' => 'success',
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $clinic = Cases::find($id);
        $clinic->delete();

        return back()
            ->with('callback', [
                'caption' => 'Kasus berhasil dihapus',
                'title' => 'Berhasil',
                'icon' => 'success',
            ]);
    }
}
