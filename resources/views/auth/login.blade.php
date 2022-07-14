<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ env('APP_NAME') }}</title>

        @yield('meta')

        @stack('before-styles')
            <link rel="stylesheet" href="{{ mix('css/app.css') }}">

            <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        @stack('after-styles')
    </head>
    <body>
        <div id="app">
            <section class="section">
                <div class="container mt-5">
                    <div class="row">
                        <div
                            class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                            <div class="login-brand">
                                <img src="{{ asset('img/logo.png') }}" alt="logo" width="100">
                            </div>

                            <div class="card card-primary">
                                <div class="card-header">
                                    <h4>Login</h4>
                                </div>

                                <div class="card-body">

                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            {{ $errors->first() }}
                                        </div>
                                    @endif

                                    <form method="POST" action="{{ route('login.process') }}" class="needs-validation">
                                        @csrf
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input id="email"
                                                type="email"
                                                class="form-control"
                                                name="email"
                                                tabindex="1"
                                                required autofocus>
                                            <div class="invalid-feedback">
                                                Please fill in your email
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="d-block">
                                                <label for="password" class="control-label">Password</label>
                                            </div>
                                            <input
                                                id="password"
                                                type="password"
                                                class="form-control"
                                                name="password"
                                                tabindex="2"
                                                required>
                                            <div class="invalid-feedback">
                                                please fill in your password
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                                Login
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="simple-footer">
                                Copyright &copy; 2021
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        @stack('before-scripts')
            <script src="{{ mix('js/app.js') }}"></script>
        @stack('after-scripts')
    </body>
</html>
