@extends('layouts.dashboard_Psico')

@section('titulo')
    Casos Asignados
@endsection

@push('styles')

@endpush

@section('content')
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Inicio</li>
    </ol>

    @if ($message = Session::get('success'))
        <div class="position-fixed mt-5 top-0 end-0 py-3 px-1" style="z-index: 11">
            <div class="toast align-items-center text-white bg-success" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="3500">
                <div class="d-flex">
                    <div class="toast-body">
                        {{ $message }}
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                    aria-label="Close"></button>
                </div>
            </div>
        </div>
    @endif

    <div class="row mb-4 justify-content-between">
        <div class="col-md-3">
            <span class="form-label bg-info p-2 rounded-pill text-white shadow-sm">Usted tiene <strong>{{ $hijos->count() }} @choice('Caso Asignado|Casos Asignados', $hijos->count())</strong>
            </span>
        </div>
        <div class="col-9 col-md-3 mt-3 mt-md-0">
            <div class="input-group rounded">
                <span class="input-group-text border-0 bg-transparent">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </span>
                <input class="form-control shadow rounded-3" type="text" placeholder="Buscar caso..." aria-label="Buscar caso..." id="buscarCaso">
            </div>
        </div>
    </div>


    {{--  <div class="row">
        @foreach ($hijos as $hijo)
            <div class="card text-dark bg-light mb-3 mx-2" style="max-width: 18rem;">
                <div class="card-header">
                    <span>N° de Caso: </span>
                    {{ $hijo->paciente->caso }}
                </div>
                <div class="card-body">
                    <h5 class="card-title"></h5>
                    <p class="card-text">
                        <ul>
                            <li>
                                <span>Nombre: {{ $hijo->paciente->nombres }}</span>
                            </li>
                            <li>
                                <span>Nombre del hijo(a): {{ $hijo->nombre }}</span>
                            </li>
                            <li>
                                <span>Fecha de Asignación: {{ $hijo->created_at }}</span>
                            </li>
                        </ul>
                    </p>
                    <div class="d-flex justify-content-center">
                        <a href="{{ route('anamnesis.create', ['id'=>$hijo]) }}" class="btn btn-info text-white">Anamnesis</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>  --}}

    {{--  <div class="row gx-md-3">  --}}
    <div class="row" >
        @foreach ($hijos as $hijo)
        <div class="col-12 col-md-4" data-role="casos">
            <div class="card shadow mb-4 rounded-3">
                <div class="card-header card-header-casos d-flex justify-content-between">
                    {{--  <span class="text-decoration-underline">Caso N°: {{ $hijo->paciente->caso }}</span>  --}}
                    <span>Caso N°: {{ $hijo->paciente->caso }}</span>
                    <span class="bg-warning small fst-italic text-black rounded-pill px-2 py-1 fw-bold" data-bs-toggle="tooltip" data-bs-placement="top" title="Fecha de Asignación">
                        <i class="fa-solid fa-calendar-day mx-2"></i>{{ Carbon\Carbon::parse($hijo->created_at)->format('d-m-Y') }}
                    </span>
                </div>
                <div class="card-body">
                    <div class="col-md-12">
                        <span class="form-label fw-bold-600">Paciente:</span>
                        <span class="fst-italic text-muted">{{ $hijo->nombre }}</span>
                    </div>
                    <div class="col-md-12">
                        <span class="form-label fw-bold-600">Madre:</span>
                        <span class="fst-italic text-muted">{{ $hijo->paciente->nombres }}</span>
                    </div>
                    <div class="col-md-12">
                        <span class="form-label fw-bold-600">Sexo:</span>
                        <span class="fst-italic text-muted">{{ $hijo->sexo }}</span>
                    </div>
                    <div class="col-md-12">
                        <span class="form-label fw-bold-600">Edad:</span>
                        <span class="fst-italic text-muted">{{ $hijo->edad }}</span>
                    </div>
                    <div class="col-md-12">
                        <a href="{{ route('caso.show', [$hijo->paciente->id]) }}">Ver más detalles</a>
                    </div>
                </div>
                <div class="card-footer bg-transparent text-center">
                    <a href="{{ route('anamnesis.create', ['id'=>$hijo]) }}" class="btn fw-bold shadow-sm" style="background-color: #ede360">Anamnesis</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>



@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function () {
            $(".toast").toast('show');
            $("#buscarCaso").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $('div[data-role="casos"]').filter(function() {
                    $(this).toggle($(this).find('span').text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
@endpush
