@extends('dashboard.layouts.app')

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <x-dashboard.utils.header title="PUSKESMAS" />

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a
                                href="{{ route($links['create']['href']) }}"
                                class="btn btn-success mr-auto">
                                {{ $links['create']['label'] }}
                            </a>

                            {{-- <form>
                                <div class="input-group">
                                    <select name="" class="form-control rounded-sm" id="">
                                        @for ($y=date('Y'); $y>2000; $y--)
                                            <option value="{{ $y }}">Tahun {{ $y }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </form> --}}
                        </div>

                        <div class="card-body p-0">
                            <x-dashboard.utils.table
                                :headers="['Nama Puskesmas', 'Kecamatan', 'Alamat','Jumlah Penduduk']"
                                :props="$props"
                                :model="$clinics"
                                :links="$links"/>
                        </div>

                        <div class="card-footer text-right">
                            <nav class="d-inline-block">
                                <x-dashboard.utils.paginator :paginator="$clinics" />
                            </nav>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('after-scripts')
    <script src="{{ asset('js/page/components-table.js') }}"></script>
@endpush
