@extends('dashboard.layouts.app')

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <x-dashboard.utils.header title="Berita" />

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a
                                href="{{ route($links['create']['href']) }}"
                                class="btn btn-success mr-auto">
                                {{ $links['create']['label'] }}
                            </a>
                        </div>

                        <div class="card-body p-0">
                            <x-dashboard.utils.table
                                :headers="['Judul Berita', 'Kategori', 'Tanggal Dibuat', 'Jumlah Pembaca']"
                                :props="$props"
                                :model="$blogs"
                                :links="$links"/>
                        </div>

                        <div class="card-footer text-right">
                            <nav class="d-inline-block">
                                <x-dashboard.utils.paginator :paginator="$blogs" />
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
