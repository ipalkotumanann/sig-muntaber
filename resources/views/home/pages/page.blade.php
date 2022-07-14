@extends('home.layouts.app')

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ $page->name ?? 'Judul Halaman' }}</h1>
            </div>

            <div class="section-body">
                <div class="card">
                    <div class="card-body">
                        {!! $page->content ?? 'Isi Halaman' !!}
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
