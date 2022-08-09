@extends('layouts.dashboard_Psico')

@section('titulo')
    Listado de Anamnesis
@endsection

@push('styles')
    <!-- CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/css/toastr.css" rel="stylesheet" />
@endpush

@section('content')
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Anamnesis realizados</li>
    </ol>

    <div class="col-9 col-md-3 mt-2 mb-4 mt-md-0">
        <div class="input-group rounded">
            <span class="input-group-text border-0 bg-transparent">
                <i class="fa-solid fa-magnifying-glass"></i>
            </span>
            <input class="form-control shadow rounded-3" type="text" placeholder="Buscar anamnesis" aria-label="Buscar anamnesis" id="buscarAnamnesis">
        </div>
    </div>

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

    @if ($anamnesis->count() <= 0)
        <h1>Aún no tiene anamnesis creados</h1>
    @else
        <div class="row">
            @foreach ($anamnesis as $anamnesi)
                <div class="col-12 col-md-4" data-role="anamnesis">
                    <div class="card shadow mb-4 rounded-3">
                        {{--  <div class="card-header" style="background-color: #00b7de">  --}}
                        <div class="card-header text-white d-flex justify-content-between" style="background-color: #202942">
                            <span class="fst-italic fw-bold">N° de Anamnesis: {{ $loop->iteration }}</span>
                            <form action="{{ route('anamnesis.destroy',[$anamnesi->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('¿Está segura de eliminar este registro?, si existe sesiones creadas para este paciente también se eliminarán de forma permanente.')" class="bg-transparent border-0 fw-bold h4 m-0" value="{{ $anamnesi->id }}"><i class="fa-solid fa-trash-arrow-up" style="color: #d23e43"></i></button>
                            </form>
                            {{--  <span class="fw-bold h4 m-0"><i class="fa-solid fa-trash-arrow-up mx-1" style="color: #d23e43"></i></span>  --}}
                            {{--  <span class="fst-italic fw-bold">N° de Anamnesis: {{ $anamnesi->id }}</span>  --}}
                        </div>
                        <div class="card-body">
                            <div class="col-md-12">
                                <span class="form-label fw-bold-600">Paciente:</span>
                                <span class="fst-italic text-muted">{{ $anamnesi->hijo->nombre }}</span>
                            </div>
                            <div class="col-md-12">
                                <span class="form-label fw-bold-600">Madre:</span>
                                <span class="fst-italic text-muted">{{ $anamnesi->hijo->paciente->nombres }}</span>
                            </div>
                            <div class="col-md-12">
                                <span class="form-label fw-bold-600">Sexo:</span>
                                <span class="fst-italic text-muted">{{ $anamnesi->hijo->sexo }}</span>
                            </div>
                            <div class="col-md-12">
                                <span class="form-label fw-bold-600">Edad:</span>
                                <span class="fst-italic text-muted">{{ $anamnesi->hijo->edad }}</span>
                            </div>
                        </div>
                        <div class="card-footer bg-transparent text-center border-0">
                            <a href="{{ route('anamnesis.show', ['id'=>$anamnesi]) }}" class="btn fw-bold" style="background-color: #00b7de"><i class="fa-solid fa-eye"></i> Ver Anamnesis</a>
                            {{--  <a href="{{ route('anamnesis.show', ['id'=>$anamnesi]) }}" class="btn fw-bold" style="background-color: #20dbbe"><i class="fa-solid fa-eye"></i> Ver Anamnesis</a>  --}}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function () {
            $(".toast").toast('show');
            $("#buscarAnamnesis").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $('div[data-role="anamnesis"]').filter(function() {
                    $(this).toggle($(this).find('span').text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
@endpush
