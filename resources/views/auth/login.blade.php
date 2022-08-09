<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>EPB - Filial La Paz</title>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('img/icon.png') }}" type="image/x-icon">

    <!-- Scripts -->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>

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

                <h2 class="text-center my-4">Inicio de Sesión</h2>
                <form method="POST" action="{{ route('login') }}" class="form-submit-prevent">
                    @csrf

                    <div class="row mb-3 justify-content-center">
                        <label for="username" class="col-md-2 col-form-label text-md-end">{{ __('Nombre de Usuario') }}</label>

                        <div class="col-md-4">
                            <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="off" autofocus>

                            {{--  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="off" autofocus>  --}}

                            @error('username')
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

                    <div class="">
                        <div class=" text-center">
                            <button type="submit" class="btn btn-submit-prevent" style="background-color: #FBAE3C;"><span class="fw-bold h5">Ingresar</span></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function () {

            $('.form-submit-prevent').on('submit', function(){
                $('.btn-submit-prevent').attr('disabled', 'true');
                $('.btn-submit-prevent').html('<i class="fa-solid fa-spinner fa-spin-pulse ic-spinner"></i><span class="fst-italic fw-bold h6"> Verificando Datos...</span>');
            });
        });
    </script>
</body>
</html>
