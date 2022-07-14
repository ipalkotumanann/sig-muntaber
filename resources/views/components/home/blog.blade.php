<div class="col-12 col-md-4 col-lg-4">
    <article class="article article-style-c">
        <div class="article-header">
            <div class="article-image" data-background="{{ asset('img/news/'.$blog['image']) }}"
                style="background-image: url(&quot;{{ asset('img/news/'.$blog['image']) }}&quot;);">
            </div>
        </div>
        <div class="article-details">
            <div class="article-category">
                <a href="#">{{ $blog->category['name'] }}</a>
                <div class="bullet"></div> {{ $blog->created_at->diffForHumans() }}
            </div>
            <div class="article-title">
                <h2><a href="{{ route('home.blog', [$blog->slug]) }}">{{ $blog->title }}</a></h2>
            </div>
            {!! Str::words(strip_tags($blog['content']), 30, '...') !!}
        </div>
    </article>
</div>
