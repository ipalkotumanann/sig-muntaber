<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ env('APP_NAME') }}</title>

        @yield('meta')

        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/components.css') }}">

        @stack('before-style')
        @stack('after-styles')
    </head>
    <body>
        <div id="app">
            <div class="main-wrapper">
                @include('dashboard.includes.nav')

                @include('dashboard.includes.sidebar')

                @yield('content')

                @include('dashboard.includes.footer')
            </div>
        </div>

        @stack('before-scripts')

        <script src="{{ mix('js/app.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.2/dist/sweetalert2.all.min.js"></script>

        <script src="{{ asset('js/stisla.js') }}"></script>
        <script src="{{ asset('js/scripts.js') }}"></script>

        @if ($callback = Session::get('callback'))
            <script>
                const icon = "{!! $callback['icon'] !!}",
                    title = "{!! $callback['title'] !!}",
                    text = "{!! $callback['caption'] !!}"

                Swal.fire({
                    icon: icon,
                    title: title,
                    text: text,
                })
            </script>
        @endif

        <script>
            function deleteConfirm(e) {
                Swal.fire({
                    title: 'Apakah kamu yakin?',
                    text: "data yang sudah dihapus tidak dapat dikembalikan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, hapus saja!'
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = e.dataset.href
                    }
                })
            }
        </script>

        @stack('after-scripts')
    </body>
</html>
