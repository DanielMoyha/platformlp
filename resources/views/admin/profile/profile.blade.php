@extends('layouts.dashboard')

@section('titulo')
    Perfil
@endsection

@push('styles')

@endpush

@section('content')
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Datos Personales</li>
    </ol>

    <div class="card shadow border-0 rounded-3 mb-5">
        {{--  <div class="d-flex justify-content-end">
            <a href="{{ route('home') }}" class="btn btn-danger m-2">Volver</a>
        </div>  --}}
        <div class="row">
            {{--  <div class="col-md-1"></div>  --}}
            <div class="col-md-4">
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
            <div class="col-md-5">
                <div class="p-3 py-md-5">
                    <div>
                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="fa-solid fa-circle-check"></i> {{ session('status') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @elseif (session('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif
                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <h3 class="text-right text-secondary"><i class="fa-solid fa-user"></i> Perfil Personal</h4>
                    </div>
                    <div class="row mt-1">
                        <div class="col-md-6 mb-3">
                            <!--<label class="form-label fw-bold-600">Nombre</label>-->
                            <label class="form-label fw-bold-600">Nombre</label>
                            <input
                                type="text"
                                class="form-control fst-italic "
                                placeholder="Aún no proporcionó su Nombre"
                                value="{{ auth()->user()->name }}"
                                readonly
                            />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold-600">Nombre de Usuario</label>
                            <input
                                type="text"
                                class="form-control fst-italic "
                                placeholder="Sin Username"
                                value="{{ auth()->user()->username }}"
                                readonly
                            >
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label class="form-label fw-bold-600">Dirección</label>
                            <input
                                type="text"
                                class="form-control fst-italic "
                                placeholder="Aún no proporcionó su dirección"
                                value="{{ auth()->user()->direccion }}"
                                readonly
                            >
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold-600">Teléfono</label>
                            <input
                                type="text"
                                class="form-control fst-italic "
                                placeholder="Sin teléfono"
                                value="{{ auth()->user()->telefono }}"
                                readonly
                            >
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold-600">Carnét de Identidad</label>
                            <input
                                type="text"
                                class="form-control fst-italic "
                                placeholder="Sin C.I."
                                value="{{ auth()->user()->ci }}"
                                readonly
                            >
                        </div>
                    </div>
                    <div class="mt-3 text-center">
                        <a class="btn btn-warning profile-button fw-bold-600" href="{{ route('profile.edit', auth()->user()->id) }}"><i class="fa-solid fa-pen"></i> Editar Datos</a>
                        <a href="{{ route('home') }}" class="btn btn-danger m-2 fw-bold"><i class="fa-solid fa-arrow-left"></i> Regresar</a>
                    </div>
                </div>
            </div>
            {{--  <div class="col-md-4">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center experience"><span>Edit Experience</span><span class="border px-3 p-1 add-experience"><i class="fa fa-plus"></i>&nbsp;Experience</span></div><br>
                    <div class="col-md-12">
                        <label class="form-label fw-bold-600">Experience in Designing</label>
                        <input type="text" class="form-control" placeholder="experience" value="">
                    </div> <br>
                    <div class="col-md-12">
                        <label class="form-label fw-bold-600">Additional Details</label>
                        <input type="text" class="form-control" placeholder="additional details" value="">
                    </div>
                </div>
            </div>  --}}
        </div>
    </div>


@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
@endpush
