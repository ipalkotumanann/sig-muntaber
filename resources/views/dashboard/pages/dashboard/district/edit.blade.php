@extends('dashboard.layouts.app')

@push('before-style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/codemirror@5.62.2/lib/codemirror.css">
@endpush

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <x-dashboard.utils.header :title="'Ubah Kecamatan '. $district['name']" />

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Lengkapi Form</h4>
                        </div>
                        <div class="card-body">
                            <x-dashboard.utils.forms.update
                                action="dashboard.district.update"
                                :id="$district['id']">

                                <x-dashboard.utils.input
                                    name="name"
                                    type="text"
                                    required="true"
                                    :value="$district['name']"
                                    label="Nama Kecamatan" />

                                <x-dashboard.utils.input
                                    name="jumlah_penduduk"
                                    type="text"
                                    required="true"
                                    :value="$district['jumlah_penduduk']"
                                    label="Jumlah Penduduk" />

                                <x-dashboard.utils.select
                                    :options="$status"
                                    :selected="$district['status']"
                                    name="status"
                                    label="Status"
                                    :props="[
                                        'value' => 'key',
                                        'label' => 'label'
                                    ]" />

                                <x-dashboard.utils.input
                                    name="type"
                                    type="radio"
                                    required="true"
                                    :value="$district['type']"
                                    classes="form-check-input"
                                    :options="[
                                        [
                                            'label' => 'Polygon',
                                            'value' => 'Polygon',
                                        ]
                                    ]"
                                    label="Tipe" />

                                <x-dashboard.utils.input
                                    name="coordinates"
                                    type="textarea"
                                    required="true"
                                    classes="codeeditor border"
                                    :value="$district['coordinates']"
                                    help-text="Masukan data latitude dan longitude dalam bentuk array."
                                    label="Batas Kordinat" />

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
    <script src="https://cdn.jsdelivr.net/npm/codemirror@5.62.2/lib/codemirror.min.js"></script>
@endpush
