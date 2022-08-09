$(document).ready(function () {
    /* $("#datatableCasos").DataTable({
        "ajax": "{{ route('data.casos') }}",
        "columns": [
            {data: 'empty'},
            {data: 'edit', name:'edit', orderable: false, searchable: false },
            {data: 'caso'},
            {data: 'nombres'},
            {data: 'edad'},
            {data: 'estado_civil'},
            {data: 'cantidad_hijos'},
            {data: 'telefono'},
            {data: 'fecha'},
            {data: 'hora'},
            {data: 'sexo'},
            {data: 'direccion'},
            {data: 'telefono_referencia'},
            {data: 'anios'},
            {data: 'nombre_esposo'},
            {data: 'edad_esposo'},
            {data: 'grado_instruccion'},
            {data: 'ocupacion'},
            {data: 'ingreso_mensual'},
            {data: 'motivo_consulta'},
            {data: 'historia_familiar'},
            {data: 'tipo_familia'},
            {data: 'tipo'},
            {data: 'conyugal'},
            {data: 'materno'},
            {data: 'paterno'},
            {data: 'fraterno'},
            {data: 'diagnostico_social'},
            {data: 'acciones'},
        ],
        responsive: true,
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
            loadingRecords: "Cargando...",
            paginate: {
                next: "Siguiente",
                previous: "Anterior",
            },
        },
    }); */

    /* var collapsedGroups = {};
    var table = $("#datatableHijos").DataTable({
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
            loadingRecords: "Cargando...",
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
    }); */

    $("#datatablePersonal").DataTable({
        responsive: true,
        autoWidth: false,
        language: {
            thousands: ",",
            lengthMenu:
                "Mostrar " +
                `<select class="custom-select custom-select-sm form-control form-control-sm">
                    <option value='5'>5</option>
                    <option value='10'>10</option>
                    <option value='25'>25</option>
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
            loadingRecords: "Cargando...",
            paginate: {
                next: "Siguiente",
                previous: "Anterior",
            },
        },
    });

    $("#datatablePasantes").DataTable({
        responsive: true,
        autoWidth: false,
        language: {
            thousands: ",",
            lengthMenu:
                "Mostrar " +
                `<select class="custom-select custom-select-sm form-control form-control-sm">
                    <option value='5'>5</option>
                    <option value='10'>10</option>
                    <option value='25'>25</option>
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
            loadingRecords: "Cargando...",
            paginate: {
                next: "Siguiente",
                previous: "Anterior",
            },
        },
        pageLength: 5,
    });

    /* $('#datatablePasantes').on('click', 'tbody td, tbody span.dtr-data', function (e) {
        alert("HOLA");
    }); */

    $("#datatableVoluntarios").DataTable({
        responsive: true,
        autoWidth: false,
        language: {
            thousands: ",",
            lengthMenu:
                "Mostrar " +
                `<select class="custom-select custom-select-sm form-control form-control-sm">
                    <option value='5'>5</option>
                    <option value='10'>10</option>
                    <option value='25'>25</option>
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
            loadingRecords: "Cargando...",
            paginate: {
                next: "Siguiente",
                previous: "Anterior",
            },
        },
        pageLength: 5,
    });

    $("#datatableSesiones").DataTable({
        responsive: true,
        columnDefs: [ {
            'targets': [2,3,4],//deshabilitar arrows de las columnas seleccionadas[0,1,2]
            'orderable': false,
        }],
        autoWidth: false,
        language: {
            thousands: ",",
            lengthMenu:
                "Mostrar " +
                `<select class="custom-select custom-select-sm form-control form-control-sm">
                    <option value='5'>5</option>
                    <option value='10'>10</option>
                    <option value='25'>25</option>
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
            loadingRecords: "Cargando...",
            paginate: {
                next: "Siguiente",
                previous: "Anterior",
            },
        },
    });
});
