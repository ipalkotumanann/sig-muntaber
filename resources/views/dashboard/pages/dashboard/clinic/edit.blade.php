@extends('dashboard.layouts.app')

@push('before-style')
    <style>
        #map-container {
            width: 100%;
            height: 300px;
            position: relative;
        }

        #map-view {
            height: 100%;
        }
    </style>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
    integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
    crossorigin=""/>

    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
@endpush

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <x-dashboard.utils.header :title="$clinic['name']" />

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Lengkapi Form</h4>
                        </div>
                        <div class="card-body">
                            <x-dashboard.utils.forms.update
                                action="dashboard.clinic.update"
                                :files="true"
                                :id="$clinic['id']">

                                <x-dashboard.utils.input
                                    name="name"
                                    type="text"
                                    required="true"
                                    :value="$clinic['name']"
                                    label="Nama Puskesmas" />

                                <x-dashboard.utils.input
                                    name="jumlah_penduduk"
                                    type="number"
                                    required="true"
                                    :value="$clinic['jumlah_penduduk']"
                                    label="Jumlah Penduduk" />

                                <x-dashboard.utils.select
                                    name="district"
                                    label="Kecamatan"
                                    :selected="$clinic['district_id']"
                                    :options="$districts"
                                    :props="[
                                        'value' => 'id',
                                        'label' => 'name'
                                    ]" />

                                <x-dashboard.utils.input
                                    name="address"
                                    type="textarea"
                                    required="true"
                                    :value="$clinic['address']"
                                    label="Alamat" />

                                {{-- <x-dashboard.utils.file
                                    name="photo"
                                    accept="image/*"
                                    :value="$clinic['photo']"
                                    label="Foto"
                                    help-text="kosongkan jika tidak inging merubah foto" /> --}}

                                <div class="col-md-6 mx-auto mb-4">
                                    <div class="section-title">Lokasi</div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Lokasi</label>

                                    <div class="col-sm-12 col-md-7">
                                        <div id="map-container">
                                            <div id="map-view"></div>
                                        </div>
                                    </div>
                                </div>

                                <x-dashboard.utils.input
                                    name="lat"
                                    type="text"
                                    required="true"
                                    :readonly="true"
                                    :value="$clinic['lat']"
                                    id="latitude"
                                    label="Latitude" />

                                <x-dashboard.utils.input
                                    name="lng"
                                    type="text"
                                    required="true"
                                    :readonly="true"
                                    :value="$clinic['lng']"
                                    id="longitude"
                                    label="Longitude" />

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <a href="{{ URL::previous() }}" class="btn btn-default">Kembali</a>
                                        <button type="submit" class="btn btn-primary">Ubah</button>
                                    </div>
                                </div>
                            </x-dashboard.utils.forms.update>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </div>
@endsection

@push('after-scripts')
    <script>
        const center = [{!! $clinic['lat'] !!}, {!! $clinic['lng'] !!}],
            map = L.map('map-view').setView(center, 13)

        let marker = L.marker(center).addTo(map)

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        map.addEventListener('click', (e) => {
            const latlng = e.latlng

            let latitude = document.getElementById('latitude'),
                longitude = document.getElementById('longitude')

            latitude.value = latlng.lat,
            longitude.value = latlng.lng

            if (marker !== null) {
                map.removeLayer(marker)
            }

            marker = L.marker([latlng.lat, latlng.lng]).addTo(map)
        });
    </script>

    <script>
        const file = document.getElementById('inputFile'),
            label = document.getElementById('label-inputFile')

        file.onchange = (e) => {
            const path = file.value,
                name = path.split(/(\\|\/)/g).pop();

            label.innerHTML = name
        }
    </script>
@endpush
