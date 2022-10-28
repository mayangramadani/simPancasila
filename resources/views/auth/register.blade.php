<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="{!! asset('asset/css/bootstrap.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('asset/fontawesome/css/all.css') !!}" rel="stylesheet">
    <link href="{!! asset('asset/css/style.css') !!}" rel="stylesheet">
    <link href="{!! asset('asset/css/bootstrap.css') !!}" rel="stylesheet">
    <script src="{!! asset('asset/js/bootstrap.bundle.min.js') !!}"></script>
    <script src="{!! asset('asset/js/bootstrap.js') !!}"></script>
    <title>SMP Sinar Pancasila</title>
</head>


<body>
    @include('sweetalert::alert')
    <main>
        <div class="container">

            <section
                class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5 col-md-6 d-flex flex-column align-items-center justify-content-center">

                            <div class="logo mb-3">
                                <img src="{!! asset('asset/img/logo.png') !!}" alt="">
                            </div>
                            {{-- <div class="text-center mb-3 name">
                                SMP Sinar Pancasila
                            </div>
                            <!-- End Logo --> --}}

                            <div class="card">

                                <div class="card-body">

                                    <div class="pt-2 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">Register</h5>
                                        <p class="text-center small">Masukkan data personal Anda</p>
                                    </div>

                                    <form class="row g-3 needs-validation" method="post"
                                        action="{{ route('register') }}" novalidate>
                                        @csrf
                                        <div class="col-12">
                                            <label for="yourName" class="form-label">Nama Lengkap</label>
                                            <input placeholder="Masukkan nama lengkap" type="text" name="name"
                                                class="form-control" id="yourName" required>
                                            <div class="invalid-feedback">Harap masukkan nama lengkap Anda!</div>
                                        </div>

                                        <div class="col-12">
                                            <label for="yourEmail" class="form-label">Email</label>
                                            <input placeholder="Masukkan email" type="email" name="email"
                                                class="form-control" id="yourEmail" required>
                                            <div class="invalid-feedback">Harap masukkan alamat email!</div>
                                        </div>

                                        <div class="col-12">
                                            <label for="yourPassword" class="form-label">Password</label>
                                            <input placeholder="Masukkan password" type="password" name="password"
                                                class="form-control" id="yourPassword" required>
                                            <div class="invalid-feedback">Harap masukkan password anda!</div>
                                        </div>

                                        <div class="col-12">
                                            <label for="yourPassword" class="form-label">Konfirmasi Password</label>
                                            <input placeholder="Ulangi password" type="password" name="password"
                                                class="form-control" id="yourPassword" required>
                                            <div class="invalid-feedback">Password tidak cocok!</div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" name="terms" type="checkbox" value=""
                                                    id="acceptTerms" required>
                                                <label class="form-check-label" for="acceptTerms">Saya setuju dengan
                                                    syarat dan aturan yang berlaku</label>
                                                <div class="invalid-feedback">Anda harus setuju sebelum membuat akun
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button class="btn btn-primary w-100" type="submit">Buat Akun</button>
                                        </div>
                                        <div class="col-12">
                                            <p class="small mb-0">Sudah punya akun? <a
                                                    href="{{ route('login') }}">Masuk</a></p>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </section>

        </div>
    </main><!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('nice/assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('nice/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('nice/assets/vendor/chart.js/chart.min.js') }}"></script>
    <script src="{{ asset('nice/assets/vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('nice/assets/vendor/quill/quill.min.js') }}"></script>
    <script src="{{ asset('nice/assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('nice/assets/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('nice/assets/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('nice/assets/js/main.js') }}"></script>

</body>

</html>





{{-- <x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout> --}}
