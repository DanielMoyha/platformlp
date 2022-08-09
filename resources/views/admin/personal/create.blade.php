@extends('layouts.dashboard')

@section('titulo')
    Registrar Nuevo Personal Administrativo
@endsection

@push('styles')
    <style>
        #togglePassword{
            cursor: pointer;
        }
    </style>
@endpush

@section('content')
<div class="row">
    <div class="d-flex justify-content-end">
        <a href="{{ route('pasante.create') }}" class="btn btn-success mx-1 mb-2"><i class="fa-solid fa-user-clock mx-1"></i> Nuevo Pasante</a>
        <a href="{{ route('personal.create') }}" class="btn btn-success mx-1 mb-2"><i class="fa-solid fa-user-gear mx-1"></i> Nuevo Voluntario</a>
    </div>
</div>
<div class="card mt-2 my-5 shadow border-0">
    <div class="card-header text-center bg-info text-white fw-bold h4">Fomulario para Nuevo Personal</div>
    <ol class="breadcrumb mb-4 p-2">
        <li class="breadcrumb-item active">Nuevo Integrante para formar parte del plantel administrativo</li>
    </ol>

    <div class="row justify-content-center px-3 px-md-0">
        <div class="col-md-10">
            <form action="{{ route('personal.store') }}" method="POST" class="needs-validation" autocomplete="off" novalidate>
                @csrf
                <div class="row mb-3">
                    <!-- NOMBRES -->
                    <div class="col-md-4">
                        <label for="name" class="col-form-label fw-bold-600 text-md-end">Nombre</label>

                        <div class="">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name') }}" required autofocus placeholder="Nombre Completo">

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <!-- CARGO - ROL -->
                    <div class="col-md-3">
                        <label for="role_id" class="col-form-label fw-bold-600 text-md-end">{{ __('Cargo') }}</label>

                        <select name="role_id" id="role_id" class="form-control @error('role_id') is-invalid @enderror" required>
                            <option selected disabled>--Seleccione un Cargo--</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>

                        @error('role_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!-- USERNAME -->
                    <div class="col-md-2">
                        <label for="username" class=" col-form-label fw-bold-600 text-md-end">{{ __('Usuario') }}</label>

                            <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" placeholder="Nombre de Usuario" autofocus required>

                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    <!-- CARNÉT DE IDENTIDAD -->
                    <div class="col-md-3">
                        <label for="ci" class="col-form-label fw-bold-600">{{ __('Carnét de Identidad') }}</label>

                        <input id="ci" type="number" class="form-control @error('ci') is-invalid @enderror"
                            name="ci" value="{{ old('ci') }}" placeholder="12345678" required autofocus>

                        @error('ci')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-2">
                    <!-- CORREO ELECTRÓNICO -->
                    <div class="col-md-4">
                        <label for="email" class="col-form-label fw-bold-600 text-md-end">{{ __('Correo Electrónico') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required placeholder="ejemplo@gmail.com">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!-- TELÉFONO -->
                    <div class="col-md-2">
                        <label for="telefono" class="col-form-label fw-bold-600 text-md-end">{{ __('Teléfono') }}</label>

                        <input id="telefono" type="number" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{ old('telefono') }}" required autofocus placeholder="7777777">

                        @error('telefono')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!-- DIRECCIÓN -->
                    <div class="col-md-6">
                        <label for="direccion" class="col-form-label fw-bold-600 text-md-end">{{ __('Dirección') }}</label>

                        <textarea name="direccion" id="direccion" class="form-control @error('direccion') is-invalid @enderror" rows="2"
                            required autofocus placeholder="Escriba la dirección por favor">{{ old('direccion') }}</textarea>

                        @error('direccion')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>


                <div class="row mb-4">
                    <!-- CONTRASEÑA -->
                    <div class="col-md-4">
                        <label for="password" class="col-form-label fw-bold-600 text-md-end">Contraseña</label>

                        <div class="input-group">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            <span class="input-group-text" onclick="password_show_hide();" role="button">
                                <i class="fas fa-eye" id="show_eye"></i>
                                <i class="fas fa-eye-slash d-none" id="hide_eye"></i>
                            </span>
                        </div>

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="text-end">
                        <a href="{{ route('personal') }}" class="btn btn-danger fw-bold mx-2"><i class="fa-solid fa-circle-xmark"></i> Cancelar</a>
                        <button type="submit" class="btn btn-success fw-bold"><i class="fa-solid fa-circle-check"></i> Registrar Administrativo</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

        <script>
            function password_show_hide() {
                let x = document.getElementById("password");
                let show_eye = document.getElementById("show_eye");
                let hide_eye = document.getElementById("hide_eye");
                hide_eye.classList.remove("d-none");
                if (x.type === "password") {
                  x.type = "text";
                  show_eye.style.display = "none";
                  hide_eye.style.display = "block";
                } else {
                  x.type = "password";
                  show_eye.style.display = "block";
                  hide_eye.style.display = "none";
                }
            }

            function password_confirm_show_hide() {
                let x = document.getElementById("password-confirm");
                let show_eye = document.getElementById("show_eye_c");
                let hide_eye = document.getElementById("hide_eye_c");
                hide_eye.classList.remove("d-none");
                if (x.type === "password") {
                  x.type = "text";
                  show_eye.style.display = "none";
                  hide_eye.style.display = "block";
                } else {
                  x.type = "password";
                  show_eye.style.display = "block";
                  hide_eye.style.display = "none";
                }
            }

            //let usernameInput = document.getElementsByName("username")[0];
            let ciInput = document.getElementsByName("ci")[0];
            let passwordInput = document.getElementsByName("password")[0];

            function process(e) {
                passwordInput.value = e.target.value.replace(/\s/g, '-');
            }
            ciInput.addEventListener("input", process);
        </script>

@endpush
