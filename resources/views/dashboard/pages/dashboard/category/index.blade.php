@extends('dashboard.layouts.app')

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <x-dashboard.utils.header title="Kategori" />

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route($links['create']['href']) }}" class="btn btn-success mr-auto">{{ $links['create']['label'] }}</a>
                            <div class="card-header-form">
                                {{-- <form>
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search">
                                        <div class="input-group-btn">
                                            <button class="btn btn-primary rounded-left"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </form> --}}
                            </div>
                        </div>

                        <div class="card-body p-0">
                            <x-dashboard.utils.table
                                :headers="['Nama Kategori', 'Slug']"
                                :props="['name', 'slug']"
                                :model="$categories"
                                :links="$links"/>
                        </div>

                        <div class="card-footer text-right">
                            <nav class="d-inline-block">
                                <x-dashboard.utils.paginator :paginator="$categories" />
                            </nav>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
