@extends('layouts.dashboard')

@section('titulo')
    Registrar Pasantes
@endsection

@push('styles')
@endpush

@section('content')
<div class="row">
    <div class="d-flex justify-content-end">
        <a href="{{ route('personal.create') }}" class="btn btn-success mx-1 mb-2"><i class="fa-solid fa-user-tie mx-1"></i> Nuevo Administrativo</a>
        <a href="{{ route('personal.create') }}" class="btn btn-success mx-1 mb-2"><i class="fa-solid fa-user-gear mx-1"></i> Nuevo Voluntario</a>
    </div>
</div>
<div class="card shadow mt-2 mb-4">
    <div class="card-header text-center bg-info text-white fw-bold h4">Formulario para un Nuevo Pasante</div>
    <ol class="breadcrumb mb-0 p-2">
        <li class="breadcrumb-item active">Nuevo Pasante que formara parte de la institución</li>
    </ol>

    <form method="POST" action="{{ route('pasante.store') }}" class="needs-validation" novalidate autocomplete="off">
        @csrf
        <div class="row justify-content-center p-3 pb-lg-3 p-lg-0">
            <div class="col-md-10">
                <div class="row mb-4">
                    <!-- NOMBRES -->
                    <div class="col-md-4">
                        <label for="name" class="col-form-label fw-bold-600 text-md-end">Nombre</label>

                        <div class="">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name') }}" required autofocus placeholder="Nombre Completo del pasante">

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <!-- TELÉFONO -->
                    <div class="col-md-3">
                        <label for="telefono" class="col-form-label fw-bold-600 text-md-end">{{ __('Teléfono') }}</label>

                        <input id="telefono" type="number" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{ old('telefono') }}" required autofocus placeholder="N° Celular del pasante">

                        @error('telefono')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!-- DIRECCIÓN -->
                    <div class="col-md-5">
                        <label for="direccion" class="col-form-label fw-bold-600 text-md-end">{{ __('Dirección') }}</label>

                        <textarea name="direccion" id="direccion" class="form-control @error('direccion') is-invalid @enderror" rows="2"
                            required autofocus placeholder="Escriba la dirección del pasante">{{ old('direccion') }}</textarea>

                        @error('direccion')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">

                    <!-- UNIVERSIDAD -->
                    <div class="col-md-6">
                        <label for="universidad" class="col-form-label fw-bold-600 text-md-end">{{ __('Universidad') }}</label>

                        <input id="universidad" type="text" class="form-control @error('universidad') is-invalid @enderror" name="universidad" value="{{ old('universidad') }}" required autofocus placeholder="Escriba la Universidad al que pertenece pasante">

                        @error('universidad')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!-- FECHA INICIO -->
                    <div class="col-md-3">
                        <label for="fecha_inicio" class="col-form-label fw-bold-600 text-md-end">{{ __('Fecha de Inicio') }}</label>

                        <input
                            class="form-control @error('fecha_inicio') is-invalid @enderror"
                            type="date"
                            name="fecha_inicio"
                            id="fecha_inicio"
                            placeholder="Escriba la dirección por favor"
                            value="{{ old('fecha_inicio') }}"
                            autofocus
                            required
                        >

                        @error('fecha_inicio')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!-- FECHA FINALL -->
                    <div class="col-md-3">
                        <label for="fecha_final" class="col-form-label fw-bold-600 text-md-end">{{ __('Fecha de Culminación') }}</label>

                        <input
                            class="form-control @error('fecha_final') is-invalid @enderror"
                            type="date"
                            name="fecha_final"
                            id="fecha_final"
                            placeholder="Escriba la dirección por favor"
                            value="{{ old('fecha_final') }}"
                            required
                        >

                        @error('fecha_final')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer d-flex align-items-center justify-content-end bg-transparent mb-2">
            <a href="{{ route('pasante') }}" class="btn btn-danger mx-2 mt-1"><i class="fa-solid fa-circle-xmark"></i> Cancelar</a>
            <button type="submit" class="btn btn-primary mt-1"><i class="fa-solid fa-circle-check"></i> Registrar Pasante</button>
        </div>
    </form>

</div>

@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
@endpush
