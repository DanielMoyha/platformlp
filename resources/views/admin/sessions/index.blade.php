@extends('layouts.dashboard')

@section('titulo')
    Sesiones
@endsection

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap5.min.css">
    <link rel="stylesheet" href="{{ asset('css/datatable.css') }}">
@endpush

@section('content')
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Sesiones realizadas por pacientes</li>
    </ol>
    <div class="row mb-3">
        <div class="col-md-6">
            
        </div>
    </div>

    <!-- Datatable - Pasantes -->
    {{--  <div class="card mb-4 border-info table-pasantes">
        <div class="card-header d-md-flex justify-content-between bg-info">
            <div class="my-2">
                <i class="fas fa-table me-1"></i>
                <span class="h5 text-dark">Listado de los Pasantes en la Institución</span>
            </div>
            <div class="">
                <a href="{{ route('pasante.create') }}" id="create-post-btn" class="btn btn-success fw-bold">Registrar Nuevo</a>
            </div>
        </div>
        <div class="card-body">

        </div>
    </div>  --}}
    <table id="datatableSesiones" class="table table-striped dt-responsive shadow rounded-3">
        <thead class="text-center" style="background-color: #f9f9f9">
            <tr>
                <th class="text-center">Caso</th>
                <th class="text-center">Nombre del Paciente</th>
                <th class="text-center">Sesiones Realizadas</th>
                <th class="text-center">Última Sesión</th>
                <th class="text-center">Encargada</th>
            </tr>
        </thead>
        <tfoot class="text-center" style="background-color: #f9f9f9">
            <tr>
                <th class="text-center">Caso</th>
                <th class="text-center">Nombre del Paciente</th>
                <th class="text-center">Sesiones Realizadas</th>
                <th class="text-center">Última Sesión</th>
                <th class="text-center">Encargada</th>
            </tr>
        </tfoot>
        <tbody>
            @foreach ($pacientes as $paciente)
                <tr>
                    <td class="text-center">
                        @if (empty($paciente->num_caso) || $paciente->num_caso == null)
                            <small class="bg-secondary rounded text-white-50 p-1 fst-italic">
                                Sin caso
                            </small>
                        @else
                            <span class="fw-bold fst-italic text-muted">{{ $paciente->num_caso }}</span>
                        @endif
                    </td>
                    <td class="">
                        @if (empty($paciente->nombre) || $paciente->nombre == null)
                            <small class="bg-secondary rounded text-white-50 p-1 fst-italic">
                                Sin nombre
                            </small>
                        @else
                            <span>{{ $paciente->nombre }}</span>
                        @endif
                    </td>
                    <td class="text-center">
                        @if (empty($paciente->num_sesion) || $paciente->num_sesion == null)
                            <small class="bg-secondary rounded text-white-50 p-1 fst-italic">
                                Sin Sesiones
                            </small>
                        @else
                            <span class="fw-bold">
                                {{ $paciente->num_sesion }}
                            </span>
                            <span class="badge bg-success fst-italic">
                                @choice('Completada|Completadas', $paciente->num_sesion)
                            </span>
                        @endif
                    </td>
                    <td class="text-center">
                        @if (empty($paciente->ultima_fecha) || $paciente->ultima_fecha == null)
                            <small class="bg-secondary rounded text-white-50 p-1 fst-italic">
                                Sin Fecha
                            </small>
                        @else
                            <span class="bg-warning small fst-italic text-white rounded-pill px-2 py-1 fw-bold">
                                <i class="fa-solid fa-calendar-check mx-1"></i>{{ Carbon\Carbon::parse($paciente->ultima_fecha)->format('d-m-Y') }}
                            </span>
                        @endif
                    </td>
                    <td class="text-center">
                        @if (empty($paciente->encargada) || $paciente->encargada == null)
                            <small class="bg-secondary rounded text-white-50 p-1 fst-italic">
                                Sin Encargada
                            </small>
                        @else
                        <span class="bg-info p-1 rounded-2 small text-white fw-bold fst-italic">{{ $paciente->encargada }}</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection


@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/responsive.bootstrap5.min.js"></script>
    <script src="{{ asset('js/datatables.js') }}"></script>
@endpush
