@extends('layouts.dashboard_Psico')

@section('titulo')
    Ver Sesión
@endsection

@push('styles')
@endpush

@section('content')
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Mostrando detalles de la sesión</li>
    </ol>

    <div class="row mb-4">
        <div class="col-md-6 offset-md-3">
            <div class="card shadow">
                <div class="card-header bg-info text-white text-center">
                    <span class="fw-bold text-uppercase p-2">Número de Sesión:</span>
                    <span class="h4 p-2">{{ $sesion->num_sesion }} de {{ $totalSesiones->count() }}</span>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label fw-bold-600">Paciente:</label>
                            <span class="fst-italic text-muted">{{ $sesion->hijo->nombre }}</span>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold-600">N° Caso:</label>
                            <span class="fst-italic text-muted">{{ $sesion->hijo->paciente->caso }}</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mt-1">
                            <label class="form-label fw-bold-600">Fecha de la Sesión:</label>
                            <div class="bg-success small fst-italic text-white rounded-pill px-2 py-1 fw-bold w-full text-center col-6 offset-3">
                                {{ Carbon\Carbon::parse($sesion->fecha)->format('d-m-Y') }}<i class="fa-solid fa-calendar-check mx-1"></i>
                            </div>
                        </div>
                        <div class="col-md-6 mt-2 mt-md-1">
                            <label class="form-label fw-bold-600">Fecha de la Próxima Sesión:</label>
                            <div class="bg-warning small fst-italic text-white rounded-pill px-2 py-1 fw-bold w-full text-center col-6 offset-3">
                                {{ Carbon\Carbon::parse($sesion->proxima_fecha)->format('d-m-Y') }}<i class="fa-solid fa-calendar-plus mx-1"></i>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mt-2">
                            <label class="form-label fw-bold-600">Desarrollo de la Sesión:</label>
                            <div class="fst-italic text-muted">{{ $sesion->desarrollo }}</div>
                        </div>
                        <div class="col-md-12 mt-2">
                            <label class="form-label fw-bold-600">Tareas de la Sesión:</label>
                            <div class="fst-italic text-muted">{{ $sesion->tareas }}</div>
                        </div>
                        <div class="col-md-12 mt-2">
                            <label class="form-label fw-bold-600">Observaciones de la Sesión:</label>
                            <div class="fst-italic text-muted">{{ $sesion->observacion }}</div>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-transparent text-end">
                    <a href="{{ route('session') }}" class="btn btn-danger fw-bolder"><i class="fa-solid fa-arrow-left"></i> Regresar</a>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
@endpush
