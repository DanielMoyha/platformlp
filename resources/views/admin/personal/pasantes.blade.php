@extends('layouts.dashboard')

@section('titulo')
    Pasantes
@endsection

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap5.min.css">
    <link rel="stylesheet" href="{{ asset('css/datatable.css') }}">
    <style>
        .error {
          color: #ca0505;
        }
    </style>
@endpush

@section('content')
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Usuarios</li>
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
    <div class="row mb-3">
        <div class="col-md-8">
            <a href="{{ route('personal') }}" class="btn btn-secondary mt-2 mt-md-0"><i class="fa-solid fa-user-tie mx-1"></i> Ver Administrativos</a>
            <a href="{{ route('pasante') }}" class="btn btn-secondary mt-2 mt-md-0"><i class="fa-solid fa-user-clock mx-1"></i> Ver Pasantes</a>
            <a href="{{ route('voluntario') }}" class="btn btn-secondary mt-2 mt-md-0"><i class="fa-solid fa-user-gear mx-1"></i> Ver Voluntarios</a>
        </div>
    </div>

    <!-- Datatable - Pasantes -->
    <div class="card mb-5 shadow table-pasantes">
        <div class="card-header d-md-flex justify-content-between bg-info">
            <div class="my-2">
                <i class="fas fa-table me-1"></i>
                <span class="h5 text-dark">Listado de los Pasantes en la Institución</span>
            </div>
            <div class="">
                <a href="{{ route('pasante.create') }}" id="create-post-btn" class="btn btn-success fw-bold"><i class="fa-solid fa-circle-plus"></i> Registrar Nuevo</a>
            </div>
        </div>
        <div class="card-body">
            <table id="datatablePasantes" class="table table-striped dt-responsive order-column">
                <thead>
                    <tr>
                        <th></th>
                        <th>Estado</th>
                        <th>Nombre Completo</th>
                        <th>Teléfono</th>
                        <th>Dirección</th>
                        <th>Universidad</th>
                        <th class="col-2">Fecha de Inicio</th>
                        <th class="col-2">Fecha Final</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th></th>
                        <th>Estado</th>
                        <th>Nombre Completo</th>
                        <th>Teléfono</th>
                        <th>Dirección</th>
                        <th>Universidad</th>
                        <th class="col-2">Fecha de Inicio</th>
                        <th class="col-2">Fecha Final</th>
                        <th>Acciones</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($pasantes as $pasante)
                        <tr id="pasante_{{ $pasante->id }}">
                            <td>
                                <div class="form-check form-switch">
                                    <input data-id="{{ $pasante->id }}" class="form-check-input mi_checkbox"
                                    type="checkbox" data-onstyle="success" data-offstyle="danger"
                                    data-toggle="toggle" data-on="Active" data-off="InActive"
                                    {{ $pasante->estado ? 'checked' : '' }}>
                                    <label class="form-check-label" for="flexSwitchCheckDefault"></label>
                                </div>
                            </td>
                            <td id="resp{{ $pasante->id }}">
                                @if ($pasante->estado == 0 || empty($pasante->estado) || $pasante->estado == null)
                                    <span class="badge bg-danger">Inactivo</span>
                                @else
                                    <span class="badge bg-success">Activo</span>
                                @endif
                            </td>
                            <td>
                                @if (empty($pasante->name) || $pasante->name == null)
                                    <small class="bg-secondary rounded text-white-50 p-1 fst-italic">
                                        Sin Nombre
                                    </small>
                                @else
                                    {{ $pasante->name }}
                                @endif
                            </td>
                            <td>
                                @if (empty($pasante->telefono) || $pasante->telefono == null)
                                    <small class="bg-secondary rounded text-white-50 p-1 fst-italic">
                                        Sin Teléfono
                                    </small>
                                @else
                                    {{ $pasante->telefono }}
                                @endif
                            </td>
                            <td>
                                @if (empty($pasante->direccion) || $pasante->direccion == null)
                                    <small class="bg-secondary rounded text-white-50 p-1 fst-italic">
                                        Sin Dirección
                                    </small>
                                @else
                                    {{ $pasante->direccion }}
                                @endif
                            </td>
                            <td>
                                @if (empty($pasante->universidad) || $pasante->universidad == null)
                                    <small class="bg-secondary rounded text-white-50 p-1 fst-italic">
                                        Sin Universidad
                                    </small>
                                @else
                                    {{ $pasante->universidad }}
                                @endif
                            </td>
                            <td class="text-center col-2">
                                @if (empty($pasante->fecha_inicio) || $pasante->fecha_inicio == null)
                                    <small class="bg-secondary rounded text-white-50 p-1 fst-italic">
                                        Sin Fecha Inicial
                                    </small>
                                @else
                                    <span class="bg-success small fst-italic text-white rounded-pill px-2 py-1 fw-bold">
                                        <i class="fa-solid fa-calendar-check"></i> {{ Carbon\Carbon::parse($pasante->fecha_inicio)->format('d-m-Y') }}
                                    </span>
                                @endif
                            </td>
                            <td class="text-center col-2">
                                @if (empty($pasante->fecha_final) || $pasante->fecha_final == null)
                                    <small class="bg-secondary rounded text-white-50 p-1 fst-italic">
                                        Sin Fecha Inicial
                                    </small>
                                @else
                                <span class="bg-warning small fst-italic text-white rounded-pill px-2 py-1 fw-bold">
                                    <i class="fa-solid fa-clock"></i> {{ Carbon\Carbon::parse($pasante->fecha_final)->format('d-m-Y') }}
                                </span>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('pasante.edit', [$pasante->id]) }}" class="bg-warning text-white mx-2 py-1 px-2 rounded-pill">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>

                                    <form action="{{ route('pasante.destroy',[$pasante->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('¿Está segura de eliminar este registro?')" class="btn btn-danger text-white mx-2 py-1 px-2 rounded-pill deleteRecord" value="{{ $pasante->id }}"><i class="fa-solid fa-trash-can"></i></button>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/responsive.bootstrap5.min.js"></script>
    <script src="{{ asset('js/datatables.js') }}"></script>

    <script>
        $(document).ready(function () {
            $(".toast").toast('show');
            $('.mi_checkbox').change(function() {
                //Verifica el estado del checkbox, si esta seleccionado sera igual a 1 de lo contrario sera igual a 0
                var estado = $(this).prop('checked') == true ? 1 : 0;
                var id = $(this).data('id');
                //console.log(estado);
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    //url: '/StatusNoticia',
                    url: '{{ route('pasante.estado') }}',
                    data: {
                        'estado': estado,
                        'id': id
                    },
                    success: function(data) {
                        $('#resp' + id).html(data.var);
                        //console.log(data.var)
                    }
                });
            });
        });
    </script>
@endpush
