@extends('dashboard.layouts.app')

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <x-dashboard.utils.header :title="$case->clinic->name.' - '.$case->year" />

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Lengkapi Form</h4>
                        </div>
                        <div class="card-body">
                            <x-dashboard.utils.forms.update
                                action="dashboard.case.update"
                                :id="$case['id']">

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tahun</label>

                                    <div class="col-sm-12 col-md-7">
                                        <select id="year-wrapper" name="year" disabled class="form-control">
                                            <option>Pilih Tahun :</option>
                                            @for($y=date('Y'); $y>=2000; $y--)
                                                <option
                                                    {{ $case->year == $y ? 'selected' : '' }}
                                                    value="{{ $y }}">
                                                    {{ $y }}
                                                </option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">PUSKESMAS</label>

                                    <div class="col-sm-12 col-md-7">
                                        <select id="clinic-wrapper" name="clinic" required class="form-control" disabled>
                                            @foreach ($clinics as $clinic)
                                                <option
                                                    value="{{ $clinic->id }}">
                                                    {{ $clinic->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6 mx-auto mb-4">
                                    <div class="section-title">Kasus</div>
                                </div>

                                <x-dashboard.utils.input
                                    name="all_ages"
                                    type="number"
                                    required="true"
                                    :value="$case['all_ages']"
                                    label="Semua Umur" />

                                <x-dashboard.utils.input
                                    name="toddler"
                                    type="number"
                                    required="true"
                                    :value="$case->toddler"
                                    label="Balita" />

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

