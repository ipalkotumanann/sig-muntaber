@extends('dashboard.layouts.app')

@push('before-style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css">
@endpush

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <x-dashboard.utils.header title="Tambah Berita" />

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Lengkapi Form</h4>
                        </div>
                        <div class="card-body">
                            <x-dashboard.utils.forms.create
                                action="dashboard.blog.store"
                                :files="true">

                                <x-dashboard.utils.select
                                    name="category"
                                    label="Kategori"
                                    :options="$categories"
                                    :props="[
                                        'value' => 'id',
                                        'label' => 'name'
                                    ]" />

                                <x-dashboard.utils.input
                                    name="title"
                                    type="text"
                                    required="true"
                                    label="Judul Berita" />

                                <x-dashboard.utils.file
                                    name="image"
                                    accept="image/*"
                                    label="Gambar"
                                    :required="true" />

                                <x-dashboard.utils.input
                                    name="content"
                                    type="textarea"
                                    required="true"
                                    classes="summernote"
                                    help-text="Masukan konten dari berita yg ingin dibuat."
                                    label="Isi Berita" />

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <a href="{{ URL::previous() }}" class="btn btn-default">Kembali</a>
                                        <button type="submit" class="btn btn-primary">Tambah</button>
                                    </div>
                                </div>
                            </x-dashboard.utils.forms.create>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </div>
@endsection

@push('after-scripts')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

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
