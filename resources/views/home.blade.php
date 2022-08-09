@extends('layouts.dashboard')

@section('titulo')
    Inicio
@endsection

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap5.min.css">
    <link rel="stylesheet" href="{{ asset('css/datatable.css') }}">
@endpush

@section('content')
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Sección Principal</li>
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

    <!-- Cards -->
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-secondary text-white mb-4 shadow">
                <div class="card-body d-flex justify-content-between">
                    <span class="h5 m-0">Plantel Institucional</span>
                    <span class="h4 m-0">{{ $totalPlantel }}</span>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4 shadow">
                <div class="card-body d-flex justify-content-between">
                    <span class="h5 m-0">Número de Casos</span>
                    <span class="h4 m-0">{{ $pacientes->count() }}</span>
                </div>
                {{--  <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="{{ route('paciente.create') }}">Crear Nuevo Caso</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>  --}}
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-white mb-4 shadow">
                <div class="card-body d-flex justify-content-between">
                    <span class="h5 m-0">Pac. sin asignación</span>
                    <span class="h4 m-0">{{ $sin_asignar }}</span>
                </div>
                {{--  <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>  --}}
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4 shadow">
                <div class="card-body d-flex justify-content-between">
                    <span class="h5 m-0">Pac. Asignados</span>
                    <span class="h4 m-0">{{ $asignados }}</span>
                </div>
                {{--  <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>  --}}
            </div>
        </div>
        <hr>
    </div>

    <!-- Gráficas -->
    <div id="chart_pacientes" class="mb-5 border rounded-3 shadow"></div>


    <!-- Datatable Casos -->
    <div class="card mb-4 shadow">
        <div class="card-header d-md-flex justify-content-between" style="background-color: #eee35c">
            <div class="my-2">
                <i class="fas fa-table me-1"></i>
                <span class="h5">Listado de Casos Registrados</span>
            </div>
            <div>
                <a href="{{ route('paciente.create') }}" class="btn fw-bold text-white" style="background-color: #78ca63"><i class="fa-solid fa-circle-plus"></i> Agregar Nuevo</a>
                <a href="{{ route('hijos') }}" class="btn fw-bold text-white mt-2 mt-md-0" style="background-color: #1dc6bc"><i class="fa-solid fa-table-list"></i> Ver Asignaciones</a>
            </div>
            {{-- <div class="">
                <a href="#" class="btn btn-success">Nuevo Caso</a>
            </div> --}}
        </div>
        <div class="card-body">
            <table id="datatableCasos" class="table table-striped dt-responsive order-column rounded-3">
                <thead>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th>Caso</th>
                        <th>Nombres</th>
                        <th>Edad</th>
                        <th>Estado Civil</th>
                        <th>Cantidad de Hijos</th>
                        <th>Teléfono</th>
                        <th>Fecha</th>
                        {{--  <th>Hora</th>  --}}
                        <th>Sexo</th>
                        <th>Ingreso Mensual</th>
                        <th>Nombre del Esposo(a)</th>
                        <th>Ocupación</th>
                        <th>Grado de Instrucción</th>
                        {{--  <th>Dirección</th>  --}}
                        {{--  <th>Número de Referencia</th>  --}}
                        {{--  <th>Años</th>  --}}
                        {{--  <th>Edad del Esposo(a)</th>  --}}
                        {{--  <th>Motivo Consulta</th>
                        <th>Historia Familiar</th>  --}}
                        {{--  <th>Tipo de Familia</th>  --}}
                        {{--  <th>Tipo</th>
                        <th>Relación Conyugal</th>
                        <th>Relación Materno</th>
                        <th>Relación Paterno</th>
                        <th>Relación Fraterno</th>
                        <th>Diagnóstico Social</th>
                        <th>Acciones a Seguir</th>  --}}
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th>Caso</th>
                        <th>Nombres</th>
                        <th>Edad</th>
                        <th>Estado Civil</th>
                        <th>Cantidad de Hijos</th>
                        <th>Teléfono</th>
                        <th>Fecha</th>
                        {{--  <th>Hora</th>  --}}
                        <th>Sexo</th>
                        <th>Ingreso Mensual</th>
                        <th>Nombre del Esposo(a)</th>
                        <th>Ocupación</th>
                        <th>Grado de Instrucción</th>
                        {{--  <th>Dirección</th>  --}}
                        {{--  <th>Número de Referencia</th>  --}}
                        {{--  <th>Años</th>  --}}
                        {{--  <th>Edad del Esposo(a)</th>  --}}
                        {{--  <th>Motivo Consulta</th>
                        <th>Historia Familiar</th>  --}}
                        {{--  <th>Tipo de Familia</th>  --}}
                        {{--  <th>Tipo</th>
                        <th>Relación Conyugal</th>
                        <th>Relación Materno</th>
                        <th>Relación Paterno</th>
                        <th>Relación Fraterno</th>
                        <th>Diagnóstico Social</th>
                        <th>Acciones a Seguir</th>  --}}
                    </tr>
                </tfoot>
                {{--  <tbody>
                    @foreach ($pacientes as $paciente)
                        <tr>
                            <td></td>
                            <td>
                                <a href="{{ route('paciente.edit', $paciente->id) }}" class="btn btn-warning py-1">
                                    <i class="fa-solid fa-file-pen"></i>
                                </a>
                            </td>
                            <td>N° {{ $paciente->caso }}</td>
                            <td>{{ $paciente->nombres }}</td>
                            <td>{{ $paciente->edad }}</td>
                            <td>{{ $paciente->estado_civil }}</td>
                            <td>{{ $paciente->cantidad_hijos }}
                                <a href="{{ route('paciente.hijos.show', ['id' => $paciente]) }}">
                                    <i class="fa-solid fa-eye mx-2" data-bs-toggle="tooltip" data-bs-placement="right" title="Ver Hijos"></i>
                                </a>

                            </td>
                            <td>{{ $paciente->telefono }}</td>
                            <td>{{ $paciente->fecha }}</td>
                            <!--<td>
                                <a href="{{ route('paciente.hijos.show', ['id'=>$paciente]) }}">Ver</a>
                            </td>-->
                            <td>{{ $paciente->hora }}</td>
                            <td>{{ $paciente->sexo }}</td>
                            <td>{{ $paciente->direccion }}</td>
                            <td>{{ $paciente->telefono_referencia }}</td>
                            <td>{{ $paciente->anios }}</td>
                            <td>{{ $paciente->nombre_esposo }}</td>
                            <td>{{ $paciente->edad_esposo }}</td>
                            <td>{{ $paciente->grado_instruccion }}</td>
                            <td>{{ $paciente->ocupacion }}</td>
                            <td>{{ $paciente->ingreso_mensual }}</td>
                            <td>{{ $paciente->motivo_consulta }}</td>
                            <td>{{ $paciente->historia_familiar }}</td>
                            <td>{{ $paciente->tipo_familia }}</td>
                            <td>{{ $paciente->tipo }}</td>
                            <td>{{ $paciente->conyugal }}</td>
                            <td>{{ $paciente->materno }}</td>
                            <td>{{ $paciente->paterno }}</td>
                            <td>{{ $paciente->fraterno }}</td>
                            <td>{{ $paciente->diagnostico_social }}</td>
                            <td>{{ $paciente->acciones }}</td>
                        </tr>
                    @endforeach
                </tbody>  --}}
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
    //
    {{--  <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>  --}}

    <script src="{{ asset('js/datatables.js') }}"></script>
    <script>
        // estas variables son creadas acá, pero después debe estar el archivo que recibe estar variables, en este caso, highcharts.js
        let year = new Date().getFullYear();
        var datas = <?php echo json_encode($datas); ?>;
        var pacientesMasculinos = <?php echo json_encode($pacientesMasculinos); ?>;
        var pacientesFemeninos = <?php echo json_encode($pacientesFemeninos); ?>;
        
    </script>
    <script src="{{ asset('js/highcharts.js') }}" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>

    <script>

        $(document).ready(function () {
            $(".toast").toast('show');

            $("#datatableCasos").DataTable({
                "ajax": "{{ route('data.casos') }}",
                "columns": [
                    {data: '', name:'', orderable: false, searchable: false},
                    {data: 'view', name:'view', orderable: false, searchable: false },
                    {data: 'edit', name:'edit', orderable: false, searchable: false },
                    {data: 'caso'},
                    {data: 'nombres'},
                    {data: 'edad'},
                    {data: 'estado_civil'},
                    {data: 'cantidad_hijos', name:'cantidad_hijos'},
                    {data: 'telefono'},
                    {data: 'fecha'},
                    {data: 'sexo', name:'sexo'},
                    {data: 'ingreso_mensual'},
                    {data: 'nombre_esposo'},
                    {data: 'ocupacion'},
                    {data: 'grado_instruccion'},
                ],
                //responsive: true,
                responsive: {
                    details: {
                        renderer: function ( api, rowIdx, columns ) {
                            var data = $.map( columns, function ( col, i ) {
                                return col.hidden ?
                                    '<tr data-dt-row="'+col.rowIndex+'" data-dt-column="'+col.columnIndex+'">'+
                                        '<td class="fw-bold col-8">'+col.title+':'+'</td> '+
                                        '<td>'+col.data+'</td>'+
                                    '</tr>' : '';
                            } ).join('');
         
                            return data ? $('<table/>').append( data ) : false;
                        }
                    }
                },
                /*dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'pdfHtml5',
                        orientation: 'landscape',
                        pageSize: 'LEGAL',
                        title: `Lista de Casos de la gestión ${year}`,
                        exportOptions: { orthogonal: 'export' }
                    },
                    {
                        extend: 'excelHtml5',
                        title: `Lista de Casos de la gestión ${year}`,
                        exportOptions: { orthogonal: 'export' }
                    }
                ],*/
                /*'columnDefs': [ {
                    'targets': [0],//deshabilitar arrows de las columnas seleccionadas[0,1,2]
                    'orderable': false,
                 }],*/
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
                    infoFiltered: `</br>` + "(Búsqueda filtrada de _MAX_ registros totales)",
                    search: "Buscar",
                    //loadingRecords: "Cargando Información...",
                    loadingRecords: `<i class="fa fa-spinner fa-spin px-2"></i> <span class="text-muted h5">Cargando datos...</span>`,
                    paginate: {
                        next: "Siguiente",
                        previous: "Anterior",
                    },
                },
            });
        });

    </script>
@endpush
