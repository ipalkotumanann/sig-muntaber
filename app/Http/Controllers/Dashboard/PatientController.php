<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

use App\Models\Patient;
use App\Models\District;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = Patient::with('district')
                        ->orderBy('created_at', 'desc')
                        ->paginate(10);

        $links = [
            'create' => [
                'label' => 'Tambah Pengidap',
                'href' => 'dashboard.patient.create'
            ],
            'update' => [
                'href' => 'dashboard.patient.edit'
            ],
            'delete' => [
                'label' => 'Tambah Pengidap',
                'href' => 'dashboard.patient.delete'
            ],
        ];

        $props = [
            'name',
            ['district', 'name'],
            'address',
            'phone',
        ];

        $data = [
            'patients' => $patients,
            'links' => $links,
            'props' => $props
        ];

        return view(
            'dashboard.pages.dashboard.patient.index',
            $data
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $districts = District::get();

        return view(
            'dashboard.pages.dashboard.patient.create',
            ['districts' => $districts]
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
        // $file       = $request->file('photo');
        // $fileext    = $file->getClientOriginalExtension();
        // $filename   = Str::random(10).'.'.$fileext;

        // $path = $file->storeAs('public/patients', $filename);

        $patient = [
            'district_id' => $request->district,
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            // 'photo' => $filename,
            'lat' => $request->lat,
            'lng' => $request->lng,
        ];

        Patient::create($patient);

        return back()
            ->with('callback', [
                'caption' => 'Pengidap berhasil ditambah',
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
        $districts = District::get();
        $patient = Patient::find($id);

        return view(
            'dashboard.pages.dashboard.patient.edit',
            [
                'districts' => $districts,
                'patient' => $patient
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
        $patient = Patient::find($id);

        $patient->district_id = $request->district;
        $patient->name = $request->name;
        $patient->phone = $request->phone;
        $patient->address = $request->address;
        $patient->lat = $request->lat;
        $patient->lng = $request->lng;

        // if ($request->hasFile('photo'))
        // {
        //     $file       = $request->file('photo');
        //     $fileext    = $file->getClientOriginalExtension();
        //     $filename   = Str::random(10).'.'.$fileext;

        //     $path = $file->storeAs('public/patients', $filename);

        //     $patient->photo = $filename;
        // }

        $patient->update();

        return back()
            ->with('callback', [
                'caption' => 'Pengidap berhasil diubah',
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
        $patient = Patient::find($id);
        $patient->delete();

        return back()
            ->with('callback', [
                'caption' => 'Pengidap berhasil dihapus',
                'title' => 'Berhasil',
                'icon' => 'success',
            ]);
    }
}
