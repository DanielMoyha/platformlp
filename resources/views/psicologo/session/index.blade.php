@extends('layouts.dashboard_Psico')

@section('titulo')
    Sesiones Registradas
@endsection

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap5.min.css">
    <link rel="stylesheet" href="{{ asset('css/datatable.css') }}">
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

    <!-- Datatable -->
    <div class="card shadow border-0 rounded-3 mb-4">
        <div class="card-header d-md-flex justify-content-between bg-info">
            <div class="my-2">
                <i class="fas fa-table me-1"></i>
                <span class="h5 text-dark">Sesiones registradas hasta el día de hoy</span>
            </div>
            {{--  <div class="">
                <a href="{{ route('personal.create') }}" class="btn btn-success fw-bold">Registrar Nuevo</a>
            </div>  --}}
        </div>
        <div class="card-body">
            <table id="datatableSesiones" class="table table-striped dt-responsive order-column">
                <thead>
                    <tr>
                        <th class="text-center">Paciente</th>
                        <th class="text-center">Número de Sesión</th>
                        <th class="text-center">Última Sesión</th>
                        <th class="text-center">Próxima Sesión</th>
                        {{--  <th>Desarrollo</th>
                        <th>Tareas</th>
                        <th>Observaciones</th>  --}}
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th class="text-center">Paciente</th>
                        <th class="text-center">Número de Sesión</th>
                        <th class="text-center">Última Sesión</th>
                        <th class="text-center">Próxima Sesión</th>
                        {{--  <th>Desarrollo</th>
                        <th>Tareas</th>
                        <th>Observaciones</th>  --}}
                        <th class="text-center">Acciones</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($sesiones as $sesion)
                        <tr>
                            <td>
                                @if (empty($sesion->hijo->nombre) || $sesion->hijo->nombre == null)
                                    <small class="bg-secondary rounded text-white-50 p-1 fst-italic">
                                        Sin nombre
                                    </small>
                                @else
                                    <span>{{ $sesion->hijo->nombre }}</span>
                                @endif
                            </td>
                            <td class="text-center">
                                @if (empty($sesion->num_sesion) || $sesion->num_sesion == null)
                                    <small class="bg-secondary rounded text-white-50 p-1 fst-italic">
                                        Sin N° de Sesión
                                    </small>
                                @else
                                    <span>{{ $sesion->num_sesion }}</span>
                                @endif
                            </td>
                            <td class="text-center">
                                @if (empty($sesion->fecha) || $sesion->fecha == null)
                                    <small class="bg-secondary rounded text-white-50 p-1 fst-italic">
                                        Sin Fecha
                                    </small>
                                @else
                                    {{--  {{ $sesion->fecha }}  --}}
                                    <span class="bg-success small fst-italic text-white rounded-pill px-2 py-1 fw-bold">
                                        {{ Carbon\Carbon::parse($sesion->fecha)->format('d-m-Y') }}<i class="fa-solid fa-calendar-check mx-1"></i>
                                    </span>
                                @endif
                            </td>
                            <td class="text-center">
                                @if (empty($sesion->proxima_fecha) || $sesion->proxima_fecha == null)
                                    <small class="bg-secondary rounded text-white-50 p-1 fst-italic">
                                        Sin Próxima Fecha
                                    </small>
                                @else
                                    {{--  {{ $sesion->proxima_fecha }}  --}}
                                    <span class="bg-warning small fst-italic text-white rounded-pill px-2 py-1 fw-bold">
                                        {{ Carbon\Carbon::parse($sesion->proxima_fecha)->format('d-m-Y') }}<i class="fa-solid fa-calendar-plus mx-1"></i>
                                    </span>
                                @endif
                            </td>
                            {{--  <td>
                                @if (empty($sesion->desarrollo) || $sesion->desarrollo == null)
                                    <small class="bg-secondary rounded text-white-50 p-1 fst-italic">
                                        Sin desarrollo
                                    </small>
                                @else
                                    {{ $sesion->desarrollo }}
                                @endif
                            </td>
                            <td>
                                @if (empty($sesion->tareas) || $sesion->tareas == null)
                                    <small class="bg-secondary rounded text-white-50 p-1 fst-italic">
                                        Sin tareas
                                    </small>
                                @else
                                    {{ $sesion->tareas }}
                                @endif
                            </td>
                            <td>
                                @if (empty($sesion->observacion) || $sesion->observacion == null)
                                    <small class="bg-secondary rounded text-white-50 p-1 fst-italic">
                                        Sin observaciones
                                    </small>
                                @else
                                    {{ $sesion->observacion }}
                                @endif
                            </td>  --}}
                            <td>
                                <div class="d-flex justify-content-center">
                                    <a href="{{ route('session.show', [$sesion->id]) }}" class="bg-primary text-white mx-2 py-1 px-2 rounded-pill">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                    <a href="{{ route('session.edit', [$sesion->id]) }}" class="bg-warning text-white mx-2 py-1 px-2 rounded-pill">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>

                                    <form action="{{ route('session.destroy', [$sesion->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('¿Está segura de eliminar esta Sesión?')" class="btn btn-danger text-white mx-2 py-1 px-2 rounded-pill deleteRecord" value=""><i class="fa-solid fa-trash-can"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


@endsection

@push('scripts')
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/responsive.bootstrap5.min.js"></script>

    <script src="{{ asset('js/datatablesPsico.js') }}"></script>

    <script>
        $(document).ready(function () {
            $(".toast").toast('show');
        });
    </script>
@endpush
