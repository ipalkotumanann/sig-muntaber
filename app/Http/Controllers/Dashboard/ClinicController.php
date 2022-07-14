<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\District;
use App\Http\Controllers\Controller;
use App\Models\Clinic;
use Illuminate\Http\Request;

class ClinicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clinics = Clinic::with('district')
                        ->orderBy('created_at', 'desc')
                        ->paginate(10);

        $links = [
            'create' => [
                'label' => 'Tambah PUSKESMAS',
                'href' => 'dashboard.clinic.create'
            ],
            'update' => [
                'href' => 'dashboard.clinic.edit'
            ],
            'delete' => [
                'label' => 'Tambah PUSKESMAS',
                'href' => 'dashboard.clinic.delete'
            ],
        ];

        $props = [
            'name',
            ['district', 'name'],
            'address','jumlah_penduduk',
        ];

        $data = [
            'clinics' => $clinics,
            'links' => $links,
            'props' => $props
        ];

        return view(
            'dashboard.pages.dashboard.clinic.index',
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
            'dashboard.pages.dashboard.clinic.create',
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
            'districts_id' => $request->district,
            'name' => $request->name,
            'jumlah_penduduk' => $request->jumlah_penduduk,
            'address' => $request->address,
            'lat' => $request->lat,
            'lng' => $request->lng,
        ];

        Clinic::create($patient);

        return back()
            ->with('callback', [
                'caption' => 'PUSKESMAS berhasil ditambah',
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
        $clinic = Clinic::find($id);

        return view(
            'dashboard.pages.dashboard.clinic.edit',
            [
                'districts' => $districts,
                'clinic' => $clinic
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
        $patient = Clinic::find($id);

        $patient->districts_id = $request->district;
        $patient->name = $request->name;
        $patient->jumlah_penduduk = $request->jumlah_penduduk;
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
                'caption' => 'PUSKESMAS berhasil diubah',
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
        $clinic = Clinic::find($id);
        $clinic->delete();

        return back()
            ->with('callback', [
                'caption' => 'PUSKESMAS berhasil dihapus',
                'title' => 'Berhasil',
                'icon' => 'success',
            ]);
    }
}
