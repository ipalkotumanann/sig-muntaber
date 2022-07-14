@extends('home.layouts.app')

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ $blog->title }}</h1>
            </div>

            <div class="section-body">
                <div class="card">
                    <div class="card-body">
                        <div class="image-wrapper">
                            <img src="{{ asset('img/news/'. $blog->image) }}" class="rounded w-100" alt="">
                        </div>
                        <div class="my-4">
                            <strong>{{ $blog->category->name }}</strong> -
                            <strong>{{ $blog->created_at->diffForHumans() }}</strong>
                        </div>
                        <div class="mt-4">
                            {!! $blog->content !!}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
