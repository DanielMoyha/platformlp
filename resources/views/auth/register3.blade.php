<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        .bg-login{
            background-image: url('img/bg-login.svg');
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
            height: 100vh;

            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>
<body class="bg-login">
    <div class="container">
        <div class="row text-white m-0">
            <div class="col-md-12 col-sm-12">

                <h2 class="text-center my-4">Registrar Usuario</h2>
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="row mb-3 justify-content-center">
                        <label for="email" class="col-md-2 col-form-label text-md-end">{{ __('Correo Electrónico') }}</label>

                        <div class="col-md-4">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="off" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3 justify-content-center">
                        <label for="password" class="col-md-2 col-form-label text-md-end">{{ __('Contraseña') }}</label>

                        <div class="col-md-4">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3 justify-content-center">
                        <div class="col-md-4 offset-md-2">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Mantener Sesión Iniciada') }}
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="row ">
                        <div class="col-12 text-center">
                            <button type="submit" class="btn" style="width: 9.6rem; height: 2.8rem; font-weight: bold; font-size: 1.1rem; background-color: #FBAE3C;">
                                {{ __('Ingresar') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    
</body>
</html>
