@extends('dashboard.layouts.app')

@push('before-style')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css">
@endpush

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <x-dashboard.utils.header :title="$blog['title']" />

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Lengkapi Form</h4>
                        </div>
                        <div class="card-body">
                            <x-dashboard.utils.forms.update
                                action="dashboard.blog.update"
                                :files="true"
                                :id="$blog['id']">

                                <x-dashboard.utils.select
                                    name="category"
                                    label="Kategori"
                                    :selected="$blog['category_id']"
                                    :options="$categories"
                                    :props="[
                                        'value' => 'id',
                                        'label' => 'name'
                                    ]" />

                                <x-dashboard.utils.input
                                    name="title"
                                    :value="$blog['title']"
                                    type="text"
                                    required="true"
                                    label="Judul Berita" />

                                <x-dashboard.utils.file
                                    name="image"
                                    accept="image/*"
                                    label="Gambar"
                                    :value="$blog['image']"
                                    helpText="Kosongkan jika tidak ingin mengganti gambar" />

                                <x-dashboard.utils.input
                                    name="content"
                                    type="textarea"
                                    required="true"
                                    classes="summernote"
                                    :value="$blog['content']"
                                    help-text="Masukan konten dari berita yg ingin dibuat."
                                    label="Isi Berita" />

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
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
@endpush
