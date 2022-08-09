@extends('layouts.dashboard_Psico')

@section('titulo')
    Perfil
@endsection

@push('styles')
@endpush

@section('content')
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Datos Personales</li>
    </ol>

    {{--  <div class="d-flex justify-content-end">
        <a href="{{ route('profile') }}" class="btn btn-danger m-2">Cancelar</a>
    </div>  --}}

    <div class="card">
        <div class="row">
        <div class="col-md-4 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                @if (auth()->user()->role_id != 1)
                    <img class="mt-md-5" width="150px" src="{{ asset('img/doc-personales.svg') }}">
                @else
                    <img class="mt-md-5" width="150px" src="{{ asset('img/doc-personales-ts.svg') }}">
                @endif
                <span class="font-weight-bold">{{ auth()->user()->role->name }}</span>
                <span class="text-black-50">{{ auth()->user()->email }}</span>
                <span></span>
            </div>
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-md-5">
                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="d-flex justify-content-between align-items-center mb-3">
                    {{--  <h4 class="text-right">Perfil Personal</h4>  --}}
                    <ul class="nav nav-tabs nav-tabs-custom nav-justified justify-content-center faq-tab-box" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a href="#datos_personales" class="nav-link active" id="pills-genarel-tab" data-bs-toggle="pill" role="tab" aria-controls="pills-genarel" aria-selected="true">
                                <h5 class="mb-0">Datos personales</h5>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a href="#cambiar_contrasenia" class="nav-link" id="pills-privacy_policy-tab" data-bs-toggle="pill" role="tab" aria-controls="pills-privacy_policy" aria-selected="false">
                                <h5 class="mb-0">Cambiar Contraseña</h5>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content" id="pills-tabContent">
                    <!-- DATOS PERSONALES -->
                    <div class="tab-pane fade active show" id="datos_personales" role="tabpanel" aria-labelledby="pills-tab">
                        <form action="{{ route('psicologo.profile.update', $user->id) }}" method="POST">
                            @method('patch')
                            @csrf
                            <div class="row mt-1">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Nombre</label>
                                    <input type="text" class="form-control" placeholder="Escriba su Nombre" name="name"
                                        value="{{ $user->name }}" />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Nombre de Usuario</label>
                                    <input type="text" class="form-control" placeholder="Escriba su nombre de usuario"
                                        name="username" value="{{ $user->username }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Correo Electrónico</label>
                                    <input
                                        type="email"
                                        class="form-control"
                                        placeholder="Escriba su correo electrónico"
                                        name="email"
                                        value="{{ $user->email }}"
                                    />
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Dirección</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        placeholder="Escriba su dirección"
                                        name="direccion"
                                        value="{{ $user->direccion }}"
                                    />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Teléfono</label>
                                    <input type="number" class="form-control" placeholder="Digite su teléfono" name="telefono"
                                        value="{{ $user->telefono }}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Carnét de Identidad</label>
                                    <input type="text" class="form-control" placeholder="Escriba su C.I." name="ci"
                                        value="{{ $user->ci }}">
                                </div>
                            </div>
                            <div class="mt-3 text-center">
                                <button class="btn btn-success profile-button" type="submit">
                                    Guardar Datos
                                </button>
                                <a href="{{ route('psicologo.profile') }}" class="btn btn-danger m-2">Cancelar</a>

                            </div>
                        </form>
                    </div>

                    <!-- CAMBIAR CONTRASEÑA -->
                    <div class="tab-pane fade" id="cambiar_contrasenia" role="tabpanel" aria-labelledby="pills-tab">
                        <form action="{{ route('update-password') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                {{--  @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @elseif (session('error'))
                                    <div class="alert alert-danger" role="alert">
                                        {{ session('error') }}
                                    </div>
                                @endif  --}}

                                <div class="mb-3">
                                    <label for="password" class="form-label">Contraseña Actual</label>
                                    <div class="input-group">
                                        <input
                                            id="password"
                                            name="old_password"
                                            type="password"
                                            class="form-control @error('old_password') is-invalid @enderror"
                                            placeholder="Escriba su Contraseña Actual"
                                        >
                                        <span class="input-group-text" onclick="password_show_hide();" role="button">
                                            <i class="fas fa-eye" id="show_eye"></i>
                                            <i class="fas fa-eye-slash d-none" id="hide_eye"></i>
                                        </span>
                                    </div>
                                    @error('old_password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!--NEW PASSWORD-->
                                <div class="mb-3">
                                    <label for="newPasswordInput" class="form-label">Nueva Contraseña</label>
                                    <div class="input-group">
                                        <input name="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror" id="newPasswordInput"
                                            placeholder="Escriba su Nueva Contraseña">
                                        <span class="input-group-text" onclick="newPassword_show_hide();" role="button">
                                            <i class="fas fa-eye" id="show_eye_n"></i>
                                            <i class="fas fa-eye-slash d-none" id="hide_eye_n"></i>
                                        </span>
                                    </div>
                                    @error('new_password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!--CONFIRM NEW PASSWORD-->
                                <div class="mb-3">
                                    <label for="confirmNewPasswordInput" class="form-label">Confirmar Nueva Contraseña</label>
                                    <div class="input-group">
                                        <input name="new_password_confirmation" type="password" class="form-control" id="confirmNewPasswordInput"
                                        placeholder="Vuelva a escribir su Nueva Contraseña">
                                        <span class="input-group-text" onclick="confirmNewPassword_show_hide();" role="button">
                                            <i class="fas fa-eye" id="show_eye_c"></i>
                                            <i class="fas fa-eye-slash d-none" id="hide_eye_c"></i>
                                        </span>
                                    </div>
                                </div>
    
                            </div>
    
                            <div class="mt-2 text-center">
                                <button class="btn btn-success">Actualizar Contraseña</button>
                                <a href="{{ route('psicologo.profile') }}" class="btn btn-danger m-2">Cancelar</a>
                            </div>
    
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        function password_show_hide() {
            let oldPassword = document.getElementById("password");
            let show_eye = document.getElementById("show_eye");
            let hide_eye = document.getElementById("hide_eye");

            hide_eye.classList.remove("d-none");

            if (oldPassword.type === "password")
            {
                oldPassword.type = "text";
                show_eye.style.display = "none";
                hide_eye.style.display = "block";
            } else {
                oldPassword.type = "password";
                show_eye.style.display = "block";
                hide_eye.style.display = "none";
            }
        }

        function newPassword_show_hide() {
            let newPassword = document.getElementById("newPasswordInput");
            let show_eye = document.getElementById("show_eye_n");
            let hide_eye = document.getElementById("hide_eye_n");
            hide_eye.classList.remove("d-none");

            if (newPassword.type === "password")
            {
                newPassword.type = "text";
                show_eye.style.display = "none";
                hide_eye.style.display = "block";
            } else {
                newPassword.type = "password";
                show_eye.style.display = "block";
                hide_eye.style.display = "none";
            }
        }

        function confirmNewPassword_show_hide() {
            let confirmNewPassword = document.getElementById("confirmNewPasswordInput");
            let show_eye = document.getElementById("show_eye_c");
            let hide_eye = document.getElementById("hide_eye_c");
            hide_eye.classList.remove("d-none");

            if (confirmNewPassword.type === "password")
            {
                confirmNewPassword.type = "text";
                show_eye.style.display = "none";
                hide_eye.style.display = "block";
            } else {
                confirmNewPassword.type = "password";
                show_eye.style.display = "block";
                hide_eye.style.display = "none";
            }
        }
    </script>
@endpush
