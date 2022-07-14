@extends('home.layouts.app')

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Berita</h1>
            </div>

            <div class="row">
                @if(count($blogs) >= 1)
                    @foreach ($blogs as $blog)
                        <x-home.blog :blog="$blog" />
                    @endforeach
                @else
                    <div class="mt-4 px-4 text-center">
                        <h4>Tidak ada blog</h4>
                    </div>
                @endif
            </div>
            <nav class="d-inline-block">
                {!! $blogs->render() !!}
            </nav>
        </section>
    </div>
@endsection
