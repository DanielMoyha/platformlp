@extends('layouts.dashboard')

@section('titulo')
    Asignaciones
@endsection

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    {{--  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs-3.3.7/dt-1.10.16/datatables.min.css"/>  --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/rowgroup/1.2.0/css/rowGroup.bootstrap5.min.css">
    <link rel="stylesheet" href="{{ asset('css/datatable.css') }}">
@endpush

@section('content')
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Listado general de todos los hijos</li>
    </ol>

    @if ($message = Session::get('success'))
        <div class="position-fixed bottom-0 end-0 py-3 px-1" style="z-index: 11">
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

    <!-- Datatable Hijos -->
    <div class="card mb-4 border-0 shadow">
        <div class="card-header d-flex justify-content-md-between" style="background-color: #e1ede5">
            <div class="my-2 fw-bold">
                <i class="fas fa-table me-1"></i>
                <span class="h5">Listado de Asignaciones</span>
            </div>
            <div class="text-end">
                <a href="{{ route('home') }}" class="btn btn-danger m-0 fw-bold"><i class="fa-solid fa-arrow-left"></i> Volver</a>
            </div>

            {{-- <div class="">
                <a href="#" class="btn btn-success">Nuevo Caso</a>
            </div> --}}
        </div>
        <div class="card-body table-responsive">
            <table id="datatableHijos" class="table table-striped dt-responsive order-column shadow-sm rounded-3">
                <thead>
                    <tr class="text-black" >
                        <th class="d-none">Caso</th>
                        <th>Encargada</th>
                        <th class="d-none">Nombres del padre</th>
                        <th>Nombres del Hijo(a)</th>
                        <th>Sexo</th>
                        <th>Edad</th>
                        <th>Fecha de Asignación</th>
                        {{--  <th></th>  --}}
                    </tr>
                </thead>
                <tfoot>
                    <tr class="text-black" >
                        <th class="d-none">Caso</th>
                        <th>Encargada</th>
                        <th class="d-none">Nombres del padre</th>
                        <th>Nombres del Hijo(a)</th>
                        <th>Sexo</th>
                        <th>Edad</th>
                        <th>Fecha de Asignación</th>
                        {{--  <th></th>  --}}
                        {{--  <th>Editar</th>  --}}
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($hijos as $hijo)
                        <tr>
                            <td class="d-none">N° de Caso: {{ $hijo->paciente->caso }}</td>
                            <td class="text-center">
                                @if ($hijo->user_id)
                                <span>
                                    <a href="{{ route('paciente.hijos.show', ['id'=>$hijo->paciente->id]) }}"><i class="fa-solid fa-eye"></i></a>
                                </span>
                                    <span class="badge bg-success fst-italic small">
                                        <i class="fa-solid fa-user-tag"></i> {{ $hijo->user->name }}
                                    </span>
                                @else
                                    <span>
                                        <a href="{{ route('paciente.hijos.show', ['id'=>$hijo->paciente->id]) }}"><i class="fa-solid fa-eye"></i></a>
                                    </span>
                                    <span class="badge bg-danger">Sin Encargada</span>
                                @endif
                            </td>
                            <td class="d-none">{{ $hijo->paciente->nombres }}</td>
                            <td>
                                <p>{{ $hijo->nombre }}</p>
                            </td>
                            <td>
                                @if ($hijo->sexo === 'Masculino')
                                    <p>{{ $hijo->sexo }} <i class="fa-solid fa-mars"></i></p>
                                @else
                                    <p>{{ $hijo->sexo }} <i class="fa-solid fa-venus"></i></p>
                                @endif
                            </td>
                            <td><p>{{ $hijo->edad }}</p></td>
                            <td class="text-left">
                                <span class="bg-info small fst-italic text-white rounded-pill px-2 py-1 fw-bold">
                                    {{ Carbon\Carbon::parse($hijo->created_at)->format('d-m-Y') }}<i class="fa-solid fa-calendar-check mx-1"></i>
                                </span>
                            </td>
                            {{--  <td><a href="{{ route('paciente.hijos.show', ['id'=>$hijo->paciente->id]) }}">Ver</a></td>  --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/responsive.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/rowgroup/1.2.0/js/dataTables.rowGroup.min.js"></script>

    <script src="{{ asset('js/datatables.js') }}"></script>
    <script>

        $(document).ready(function () {
            $(".toast").toast('show');

            var collapsedGroups = {};
            var table = $("#datatableHijos").DataTable({
                /*"ajax": "{{ route('hijos.data') }}",
                "columns": [
                    {data: 'paciente_id', name:'paciente_id', visible: false},
                    {data: 'user_id', name:'user_id'},
                    //{data: 'paciente_id', name:'paciente_id', visible: false},
                    {data: 'nombre'},
                    {data: 'sexo', name:'sexo'},
                    {data: 'edad'},
                    {data: 'created_at', name:'created_at'},
                ],*/
                responsive: true,
                columnDefs: [ {
                    'targets': [0,1,3,4,5,6],//deshabilitar arrows de las columnas seleccionadas[0,1,2]
                    'orderable': false,
                }],
                autoWidth: false,
                language: {
                    thousands: ",",
                    lengthMenu:
                        "Mostrar " +
                        `<select class="custom-select custom-select-sm form-control form-control-sm" >
                            <option value='5'>5</option>
                            <option value='10'>10</option>
                            <option value='25'>25</option>
                            <option value='50'>50</option>
                            <option value='100'>100</option>
                            <option value='-1'>Todos</option>
                        </select>` +
                        " Registros por página",
                    zeroRecords: "Registros no encontrados",
                    // info: "Mostrando la página _PAGE_ de _PAGES_",
                    info: "Mostrando registros del _START_ al _END_ de _TOTAL_ registros",
                    // emptyTable: "No hay registros disponibles",
                    infoEmpty: "No hay registros disponibles",
                    infoFiltered:
                        `</br>` + "(Búsqueda filtrada de _MAX_ registros totales)",
                    search: "Buscar",
                    loadingRecords: `<i class="fa fa-spinner fa-spin px-2"></i> <span class="text-muted h5">Cargando datos...</span>`,
                    paginate: {
                        next: "Siguiente",
                        previous: "Anterior",
                    },
                },
                pageLength: -1,
                order: [
                    //[2, "asc"],
                    //[1, 'asc']
                ],
                rowGroup: {
                    dataSrc: 0,
                    startRender: function (rows, group) {
                        var collapsed = !!collapsedGroups[group];

                        rows.nodes().each(function (r) {
                            r.style.display = 'none';
                            if (collapsed) {
                            r.style.display = '';
                            }});

                        // Add category name to the <tr>. NOTE: Hardcoded colspan
                        return $("<tr/>")
                            .append(
                                '<td colspan="5" style="background-color:#f1fcce;" class="border rounded-2" role="button">'
                                + '<span class="fw-bold">' + group + '</span>' + '<span class="text-muted fst-italic">'  + " (" + "Tiene " + rows.count() + " Asignaciones"+") " + '</span>' + " </td>"
                            ).attr("data-name", group).toggleClass("collapsed", collapsed);
                    },
                },
            });

            $('#datatableHijos tbody').on('click', 'tr.dtrg-start', function() {
                var name = $(this).data('name');

                collapsedGroups[name] = !collapsedGroups[name];
                table.draw(false);
            });
        });

    </script>
@endpush
