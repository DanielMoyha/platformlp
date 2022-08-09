@extends('layouts.dashboard')

@section('titulo')
    Registrar Nuevo Voluntario
@endsection

@push('styles')

@endpush

@section('content')
<div class="row">
    <div class="d-flex justify-content-end">
        <a href="{{ route('personal.create') }}" class="btn btn-success mx-1 mb-2"><i class="fa-solid fa-user-tie mx-1"></i> Nuevo Administrativo</a>
        <a href="{{ route('pasante.create') }}" class="btn btn-success mx-1 mb-2"><i class="fa-solid fa-user-clock mx-1"></i> Nuevo Pasante</a>
    </div>
</div>
<div class="card border-info mb-5 shadow">
    <div class="card-header text-center bg-info text-white fw-bold h4">Formulario para un Nuevo Voluntario</div>
    <ol class="breadcrumb mb-0 p-2">
        <li class="breadcrumb-item active">Nuevo Voluntario que pasará a formar parte de la institución</li>
    </ol>
    <form method="POST" action="{{ route('voluntario.store') }}" class="needs-validation" novalidate>
        @csrf
        <div class="row justify-content-center p-3 pb-lg-3 p-lg-0">
            <div class="col-md-10">
                    <div class="row mb-4">
                        <!-- NOMBRES -->
                        <div class="col-md-4">
                            <label for="name" class="col-form-label text-md-end">Nombre</label>

                            <div class="">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" required autofocus placeholder="Nombre Completo del voluntario">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- TELÉFONO -->
                        <div class="col-md-3">
                            <label for="telefono" class="col-form-label text-md-end">{{ __('Teléfono') }}</label>

                            <input id="telefono" type="number" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{ old('telefono') }}" required autofocus placeholder="N° Celular del voluntario">

                            @error('telefono')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- DIRECCIÓN -->
                        <div class="col-md-5">
                            <label for="direccion" class="col-form-label text-md-end">{{ __('Dirección') }}</label>

                            <textarea name="direccion" id="direccion" class="form-control @error('direccion') is-invalid @enderror" rows="2"
                                required autofocus placeholder="Escriba la dirección del voluntario">{{ old('direccion') }}</textarea>

                            @error('direccion')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <!-- PROFESIÓN -->
                        <div class="col-md-6">
                            <label for="profesion" class="col-form-label text-md-end">{{ __('Profesión') }}</label>

                            <input id="profesion" type="text" class="form-control @error('profesion') is-invalid @enderror" name="profesion" value="{{ old('profesion') }}" required autofocus placeholder="Escriba la profesión del Voluntario">

                            @error('profesion')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
            </div>
        </div>
        <div class="card-footer d-flex align-items-center justify-content-end">
            <a href="{{ route('voluntario') }}" class="btn btn-danger fw-bold mx-2"><i class="fa-solid fa-circle-xmark"></i> Cancelar</a>
            <button type="submit" class="btn btn-primary fw-bold"><i class="fa-solid fa-circle-check"></i> Registrar Voluntario</button>
        </div>
    </form>
</div>

@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

@endpush
