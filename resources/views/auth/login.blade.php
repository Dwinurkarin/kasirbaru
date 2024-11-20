<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Log-in</title>

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
                            <h1>Log-in</h1>
                          </div>
                        </div>
                      </div>
                    </div>
                    <form method="POST" action="{{ route('login') }}">
                      @csrf
                      <div class="row gy-3 overflow-hidden">
                        <div class="col-12">
                          <div class="form-floating mb-3">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}" placeholder="name@example.com" required autofocus>
                            <label for="email" class="form-label">Email</label>
                            @error('email')
                              <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                          </div>
                        </div>
                        <div class="col-12">
                          <div class="form-floating mb-3">
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Password" required>
                            <label for="password" class="form-label">Password</label>
                            @error('password')
                              <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                          </div>
                        </div>
                        <div class="col-12">
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label text-secondary" for="remember">
                              Keep me logged in
                            </label>
                          </div>
                        </div>
                        <div class="col-12">
                          <div class="d-grid">
                            <button class="btn btn-dark btn-lg" type="submit">Log in now</button>
                          </div>
                        </div>
                      </div>
                    </form>
                    <div class="row">
                      <div class="col-12">
                        <div class="d-flex gap-2 gap-md-4 flex-column flex-md-row justify-content-md-center mt-5">
                          <a href="{{ route('register') }}" class="link-secondary text-decoration-none">Create new account</a>
                          <a href="{{ route('password.request') }}" class="link-secondary text-decoration-none">Forgot password</a>
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
