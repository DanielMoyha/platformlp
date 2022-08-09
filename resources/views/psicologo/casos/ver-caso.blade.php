@extends('layouts.dashboard_Psico')

@section('titulo')
    Ver Caso
@endsection

@push('styles')
    <!-- CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/css/toastr.css" rel="stylesheet" />
@endpush

@section('content')
    <div class="d-flex justify-content-between">
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Mostrando detalles del caso</li>
        </ol>
    </div>

    <div class="card border-0 shadow">
        <div class="card-header text-center bg-info text-white h5 fw-bold"><i class="fa-solid fa-box-archive"></i> ATENCIÓN DE CASO - TRABAJO SOCIAL</div>
        <div class="card-body">
            <div class="row">
                <div class="d-md-flex justify-content-between">
                    <div class="col-md-3">
                        <label class="form-label fw-bold-600">N° de Caso: </label>
                        <span class="fst-italic text-muted">{{ $paciente->caso }}</span>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label fw-bold-600"><i class="fa-solid fa-calendar-day"></i> Fecha: </label>
                        <span class="fst-italic text-muted">{{ $paciente->fecha }}</span>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label fw-bold-600"><i class="fa-solid fa-clock"></i> Hora: </label>
                        <span class="fst-italic text-muted">{{ $paciente->hora }}</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="d-md-flex justify-content-between">
                    <div class="col-md-4">
                        <label class="form-label fw-bold-600"><i class="fa-solid fa-address-card"></i> Nombre y Apellido: </label>
                        <span class="fst-italic text-muted">{{ $paciente->nombres }}</span>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label fw-bold-600">Edad: </label>
                        <span class="fst-italic text-muted">{{ $paciente->edad }}</span>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label fw-bold-600"><i class="fa-solid fa-mars-and-venus"></i> Sexo: </label>
                        <span class="fst-italic text-muted">{{ $paciente->sexo }}</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="d-md-flex justify-content-between">
                    <div class="col-md-5">
                        <label class="form-label fw-bold-600"><i class="fa-solid fa-location-dot"></i> Dirección: </label>
                        <span class="fst-italic text-muted">{{ $paciente->direccion }}</span>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-bold-600"><i class="fa-solid fa-phone"></i> Teléfono: </label>
                        <span class="fst-italic text-muted">{{ $paciente->telefono }}</span>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label fw-bold-600"><i class="fa-solid fa-phone"></i> Num. Referencia: </label>
                        <span class="fst-italic text-muted">{{ $paciente->telefono_referencia }}</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="d-md-flex justify-content-between">
                    <div class="col-md-4">
                        <label class="form-label fw-bold-600"><i class="fa-solid fa-person-circle-question"></i> Estado Civil: </label>
                        <span class="fst-italic text-muted">{{ $paciente->estado_civil }}</span>
                    </div>
                    <div class="col-md-7">
                        <label class="form-label fw-bold-600">Años: </label>
                        <span class="fst-italic text-muted">{{ $paciente->anios }}</span>
                    </div>
                    {{--  <div class="col-md-2">
                        <label class="form-label text-uppercase fw-bold">Num. Referencia: </label>
                        <span>{{ $paciente->telefono_referencia }}</span>
                    </div>  --}}
                </div>
            </div>
            <div class="row">
                <div class="d-md-flex justify-content-between">
                    <div class="col-md-4">
                        <label class="form-label fw-bold-600"><i class="fa-solid fa-address-card"></i> Nombre del esposo(a): </label>
                        <span class="fst-italic text-muted">{{ $paciente->nombre_esposo }}</span>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label fw-bold-600">Edad: </label>
                        <span class="fst-italic text-muted">{{ $paciente->edad_esposo }}</span>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label fw-bold-600"><i class="fa-solid fa-user-graduate"></i> Grado de Instrucción: </label>
                        <span class="fst-italic text-muted">{{ $paciente->grado_instruccion }}</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="d-md-flex justify-content-between">
                    <div class="col-md-12">
                        <label class="form-label fw-bold-600"><i class="fa-solid fa-children"></i> Cuántos Hijos tiene: </label>
                        <span class="fst-italic text-muted">{{ $paciente->cantidad_hijos }}</span>
                        <span class="small fst-italic text-muted">(Por privacidad no puede ver los datos de los otros hijos)</span>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="d-md-flex justify-content-between">
                    <div class="col-md-4">
                        <label class="form-label fw-bold-600"><i class="fa-solid fa-user-tie"></i> Ocupación: </label>
                        <span class="fst-italic text-muted">{{ $paciente->ocupacion }}</span>
                    </div>
                    <div class="col-md-7">
                        <label class="form-label fw-bold-600"><i class="fa-solid fa-sack-dollar"></i> Ingreso Mensual: </label>
                        <span class="fst-italic text-muted">{{ $paciente->ingreso_mensual }}</span>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="d-md-flex justify-content-between">
                    <div class="col-md-12">
                        <label class="form-label fw-bold-600"><i class="fa-solid fa-file-lines"></i> Motivo de Consulta: </label>
                        <div class="fst-italic text-muted">{{ $paciente->motivo_consulta }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card border-0 shadow my-4">
        <div class="card-header text-center bg-info text-white h5 fw-bold"><i class="fa-solid fa-clipboard-question"></i> ENTREVISTA INICIAL</div>
        <div class="card-body">
            <div class="row">
                <div class="d-md-flex justify-content-between">
                    <div class="col-md-12">
                        <label class="form-label fw-bold-600"><i class="fa-solid fa-timeline"></i> Historia Familiar: </label>
                        <div class="fst-italic text-muted">{{ $paciente->historia_familiar }}</div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="d-md-flex justify-content-between text-center">
                    <div class="col-md-12 mt-3">
                        <label class="form-label text-uppercase fw-bold text-muted fst-italic">
                            <u>Estructura y Dinámica Familiar.</u>
                        </label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="d-md-flex justify-content-between border-bottom">
                    <div class="col-md-4">
                        <label class="form-label fw-bold-600">Tipo de Familia: </label>
                        <span class="fst-italic text-muted">{{ $paciente->tipo_familia }}</span>
                    </div>
                    <div class="col-md-7">
                        <label class="form-label fw-bold-600">Tipo: </label>
                        <span class="fst-italic text-muted">{{ $paciente->tipo }}</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="d-md-flex justify-content-between text-center">
                    <div class="col-md-12 mt-3">
                        <label class="form-label text-uppercase fw-bold text-muted fst-italic">
                            <u>Las Relaciones Familiares.</u>
                        </label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="d-md-flex justify-content-evenly">
                    <div class="col-md-6">
                        <label class="form-label fw-bold-600">Relación Conyugal: </label>
                        <span class="fst-italic text-muted">{{ $paciente->conyugal }}</span>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold-600">Relación Materno-Filial: </label>
                        <span class="fst-italic text-muted">{{ $paciente->materno }}</span>
                    </div>
                </div>
                <div class="d-md-flex justify-content-evenly border-bottom">
                    <div class="col-md-6">
                        <label class="form-label fw-bold-600">Relación Paterno-Filial: </label>
                        <span class="fst-italic text-muted">{{ $paciente->paterno }}</span>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold-600">Relación Fraterno-Filial: </label>
                        <span class="fst-italic text-muted">{{ $paciente->fraterno }}</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="d-md-flex justify-content-between mt-3">
                    <div class="col-md-12">
                        <label class="form-label fw-bold-600"><i class="fa-solid fa-person-circle-exclamation"></i> Diagnóstico Social: </label>
                        <div class="fst-italic text-muted">{{ $paciente->diagnostico_social }}</div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="d-md-flex justify-content-between my-3">
                    <div class="col-md-12">
                        <label class="form-label fw-bold-600"><i class="fa-solid fa-clipboard-list"></i> Acciones a Seguir: </label>
                        <div class="fst-italic text-muted">{{ $paciente->acciones }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer text-end bg-transparent">
            <a href="{{ route('casos.list') }}" class="btn btn-danger fw-bold"><i class="fa-solid fa-arrow-left"></i> Regresar</a>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
    </script>

@endpush
