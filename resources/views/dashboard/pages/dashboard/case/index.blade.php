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

                            <form>
                                <div class="input-group">
                                    <select name="year" class="form-control rounded-sm" id="year-filter">
                                        @for ($y=date('Y'); $y>2000; $y--)
                                            <option
                                                {{ Request::get('year') == $y ? 'selected' : '' }}
                                                value="{{ $y }}">
                                                Tahun {{ $y }}
                                            </option>
                                        @endfor
                                    </select>
                                </div>
                            </form>
                        </div>

                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th rowspan="2" width="100px" class="text-center">No</th>
                                            <th rowspan="2">Puskesmas</th>
                                            <th rowspan="2">Tahun</th>
                                            <th class="text-center">Semua Usia</th>
                                            <th class="text-center">Balita</th>
                                            <th class="text-center">CFR (%)</th>
                                            <th class="text-center" width="175px">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(count($cases) >= 1)
                                            @foreach ($cases as $data)
                                                <tr class="text-center">
                                                    <td class="text-center">{{ $loop->iteration + $cases->firstItem() - 1 }}</td>
                                                    <td class="text-left">{{ $data->clinic->name }}</td>
                                                    <td>{{ $data->year }}</td>
                                                    <td>{{ $data->all_ages }}</td>
                                                    <td>{{ $data->toddler }}</td>
                                                    <td>{{ round(($data->all_ages+$data->toddler)/$data->clinic->jumlah_penduduk*100) }} %</td>
                                                    <td>
                                                        <a
                                                            href="{{ route($links['update']['href'], [$data['id']]) }}"
                                                            class="btn btn-sm btn-info">
                                                            <i class="far fa-edit"></i>
                                                        </a>
                                                        <button
                                                            class="btn btn-sm btn-danger"
                                                            onclick="deleteConfirm(this)"
                                                            data-href="{{ route($links['delete']['href'], [$data['id']]) }}">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="13" class="text-center">
                                                    <h3 class="my-5">Tidak ada data</h3>
                                                </td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="card-footer text-right">
                            <nav class="d-inline-block">
                                <x-dashboard.utils.paginator year="{{ Request::input('year') }}" :paginator="$cases" />
                            </nav>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('after-scripts')
    <script>
        const year = document.getElementById('year-filter')

        year.onchange = () => {
            window.location.href = `/dashboard/cases?year=${year.value}`
        }
    </script>
@endpush
