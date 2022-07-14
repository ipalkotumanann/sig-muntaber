@extends('dashboard.layouts.app')

@push('before-style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/codemirror@5.62.2/lib/codemirror.css">
@endpush

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <x-dashboard.utils.header :title="'Ubah Admin '. $user->name" />

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Lengkapi Form</h4>
                        </div>
                        <div class="card-body">
                            <x-dashboard.utils.forms.update
                                action="dashboard.user.update"
                                :id="$user->id">

                                <x-dashboard.utils.input
                                    name="name"
                                    type="text"
                                    :value="$user['name']"
                                    required="true"
                                    label="Nama" />

                                <x-dashboard.utils.input
                                    name="email"
                                    type="email"
                                    :value="$user['email']"
                                    required="true"
                                    label="Email" />

                                <x-dashboard.utils.input
                                    name="username"
                                    type="text"
                                    required="true"
                                    :value="$user['username']"
                                    label="Username" />

                                <div class="col-md-9 ml-auto mb-4">
                                    <div class="section-title">Ganti Password</div>
                                </div>

                                <x-dashboard.utils.input
                                    name="old_password"
                                    type="password"
                                    id="old-password"
                                    helpText="Kosongkan jika tidak ingin mengganti password"
                                    label="Password" />

                                <x-dashboard.utils.input
                                    name="password"
                                    type="password"
                                    id="password"
                                    label="Password" />

                                <x-dashboard.utils.input
                                    name="re-password"
                                    type="password"
                                    id="re-password"
                                    label="Ulangi Password"
                                    helpText="Masukan password yg sama sekali lagi" />

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <a href="{{ URL::previous() }}" class="btn btn-default">Kembali</a>
                                        <button type="submit" class="btn btn-primary">Ubah</button>
                                    </div>
                                </div>
                            </x-dashboard.utils.forms.update>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </div>
@endsection

@push('after-scripts')
    <script src="https://cdn.jsdelivr.net/npm/codemirror@5.62.2/lib/codemirror.min.js"></script>

    <script>
        const password = document.getElementById('password'),
            rePassword = document.getElementById('re-password'),
            oldPassword = document.getElementById('old-password'),
            form = document.getElementsByTagName('form')[1]

        form.onsubmit = (e) => {
            e.preventDefault();

            if (password.value !== rePassword.value) {
                rePassword.classList.add('is-invalid')
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Password dan Ulangi password tidak sama.',
                })
            } else {
                form.submit();
            }
        }
    </script>
@endpush
