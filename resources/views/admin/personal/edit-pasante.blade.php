@extends('layouts.dashboard')

@section('titulo')
    Edición de Pasantes
@endsection

@push('styles')
@endpush

@section('content')
<div class="card shadow mt-4">
    <div class="card-header text-center bg-info text-white fw-bold h4">Modificar datos del Pasante</div>
    <ol class="breadcrumb mb-0 p-2">
        <li class="breadcrumb-item active">Modificar datos del pasante</li>
    </ol>

    <form method="POST" action="{{ route('pasante.update', [$pasante->id]) }}" class="needs-validation" novalidate autocomplete="off">
        @method('PUT')
        @csrf
        <div class="row justify-content-center p-3 pb-lg-3 p-lg-0">
            <div class="col-md-10">
                <div class="row mb-4">
                    <!-- NOMBRES -->
                    <div class="col-md-4">
                        <label for="name" class="col-form-label fw-bold-600 text-md-end">Nombre</label>

                        <div class="">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ $pasante->name }}" required autofocus placeholder="Nombre Completo del pasante">

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

                        <input id="telefono" type="number" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{ $pasante->telefono }}" required autofocus placeholder="N° Celular del pasante">

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
                            required autofocus placeholder="Escriba la dirección del pasante">{{ $pasante->direccion }}</textarea>

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

                        <input id="universidad" type="text" class="form-control @error('universidad') is-invalid @enderror" name="universidad" value="{{ $pasante->universidad }}" required autofocus placeholder="Escriba la Universidad al que pertenece pasante">

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
                            value="{{ $pasante->fecha_inicio }}"
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
                            value="{{ $pasante->fecha_final }}"
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
        <div class="card-footer d-flex align-items-center justify-content-end bg-transparent">
            <a href="{{ route('pasante') }}" class="btn btn-danger mx-2"><i class="fa-solid fa-circle-xmark"></i> Cancelar</a>
            <button type="submit" class="btn btn-success fw-bold"><i class="fa-solid fa-circle-check"></i> Actualizar Pasante</button>
        </div>
    </form>
</div>

@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
@endpush
