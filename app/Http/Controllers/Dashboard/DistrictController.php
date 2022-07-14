<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

use App\Models\District;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    public $status;

    public function __construct() {
        $this->status = [
            [
                'key' => 1,
                'label' => 'Rendah'
            ],
            [
                'key' => 2,
                'label' => 'Sedang'
            ],
            [
                'key' => 3,
                'label' => 'Tinggi'
            ],
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $districts = District::orderBy('name', 'ASC')
                        ->paginate(10);
        $links = [
            'create' => [
                'label' => 'Tambah Kecamatan',
                'href' => 'dashboard.district.create'
            ],
            'update' => [
                'href' => 'dashboard.district.edit'
            ],
            'delete' => [
                'label' => 'Tambah Kecamatan',
                'href' => 'dashboard.district.delete'
            ],
        ];

        $data = [
            'districts' => $districts,
            'links' => $links
        ];

        return view(
            'dashboard.pages.dashboard.district.index',
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
        return view(
            'dashboard.pages.dashboard.district.create',
            ['status' => $this->status]
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
        $district = [
            'name' => $request->name,
            'status' => $request->status,
            'jumlah_penduduk' => $request->jumlah_penduduk,
            'geometry' => [
                'type' => $request->type,
                'coordinates' => json_decode($request->coordinates),
            ],
        ];

        District::create($district);

        return back()
            ->with('callback', [
                'caption' => 'Kecamatan berhasil ditambah',
                'title' => 'Berhasil',
                'icon' => 'success',
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\District  $district
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $get = District::find($id);

        $district = [
            'id' => $get->id,
            'name' => $get->name,
            'jumlah_penduduk' => $get->jumlah_penduduk,
            'status' => $get->status,
            'type' => $get->geometry['type'],
            'coordinates' => json_encode($get->geometry['coordinates'])
        ];

        return view(
            'dashboard.pages.dashboard.district.edit',
            [
                'district' => $district,
                'status' => $this->status,
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\District  $district
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $district = District::find($id);

        $district->name = $request->name;
        $district->status = $request->status;
        $district->jumlah_penduduk = $request->jumlah_penduduk;
        $district->geometry = [
            'type' => $request->type,
            'coordinates' => json_decode($request->coordinates),
        ];

        $district->update();

        return back()
            ->with('callback', [
                'caption' => 'Kecamatan berhasil diubah',
                'title' => 'Berhasil',
                'icon' => 'success',
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\District  $district
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $district = District::find($id);
        $district->delete();

        return back()
            ->with('callback', [
                'caption' => 'Kecamatan berhasil dihapus',
                'title' => 'Berhasil',
                'icon' => 'success',
            ]);
    }
}
