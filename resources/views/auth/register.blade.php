<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Register</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
<section class="bg-light p-3 p-md-4 p-xl-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-xxl-11">
                <div class="card border-light-subtle shadow-sm">
                    <div class="row g-0">
                        <div class="col-12 col-md-6">
                            <img class="img-fluid rounded-start w-100 h-100 object-fit-cover" loading="lazy" src="{{ asset('img/cafe.jpg') }}" alt="Tempat Belanja">
                        </div>
                        <div class="col-12 col-md-6 d-flex align-items-center justify-content-center">
                            <div class="col-12 col-lg-11 col-xl-10">
                                <div class="card-body p-3 p-md-4 p-xl-5">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mb-5">
                                                <div class="text-center mb-4">
                                                    <h1>{{ __('Register') }}</h1>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf
                                        <div class="row gy-3 overflow-hidden">
                                            <!-- Name Field -->
                                            <div class="col-12">
                                                <div class="form-floating mb-3">
                                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Enter your name">
                                                    <label for="name" class="form-label">Name</label>
                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <!-- Email Field -->
                                            <div class="col-12">
                                                <div class="form-floating mb-3">
                                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="name@example.com">
                                                    <label for="email" class="form-label">Email</label>
                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <!-- Password Field -->
                                            <div class="col-12">
                                                <div class="form-floating mb-3">
                                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Create a password">
                                                    <label for="password" class="form-label">Password</label>
                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <!-- Confirm Password Field -->
                                            <div class="col-12">
                                                <div class="form-floating mb-3">
                                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm your password">
                                                    <label for="password-confirm" class="form-label">Confirm Password</label>
                                                </div>
                                            </div>

                                            <!-- Submit Button -->
                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <button type="submit" class="btn btn-dark btn-lg">Register</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                    <!-- Links for Login or Forgot Password -->
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="d-flex gap-2 gap-md-4 flex-column flex-md-row justify-content-md-center mt-5">
                                                <a href="{{ route('login') }}" class="link-secondary text-decoration-none">Already have an account? Login</a>
                                                <a href="{{ route('password.request') }}" class="link-secondary text-decoration-none">Forgot your password?</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>
