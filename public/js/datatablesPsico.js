$(document).ready(function () {
    
    $("#datatableSesiones").DataTable({
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
    });

});