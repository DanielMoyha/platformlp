@extends('layouts.dashboard')

@section('titulo')
    Administración
@endsection

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap5.min.css">

    {{--  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.8.8/semantic.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.semanticui.min.css">  --}}
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
    <div class="row mb-3">
        <div class="col-md-8">
            <a href="{{ route('personal') }}" class="btn btn-secondary mt-2 mt-md-0"><i class="fa-solid fa-user-tie mx-1"></i> Ver Administrativos</a>
            <a href="{{ route('pasante') }}" class="btn btn-secondary mt-2 mt-md-0"><i class="fa-solid fa-user-clock mx-1"></i> Ver Pasantes</a>
            <a href="{{ route('voluntario') }}" class="btn btn-secondary mt-2 mt-md-0"><i class="fa-solid fa-user-gear mx-1"></i> Ver Voluntarios</a>
        </div>
    </div>

    <!-- Datatable -->
    <div class="card mb-5 shadow table-administrativos">
        <div class="card-header d-md-flex justify-content-between bg-info">
            <div class="my-2">
                <i class="fas fa-table me-1"></i>
                <span class="h5 text-dark">Listado del Personal de la Institución</span>
            </div>
            <div class="">
                <a href="{{ route('personal.create') }}" class="btn btn-success fw-bold"><i class="fa-solid fa-circle-plus"></i> Registrar Nuevo</a>
            </div>
        </div>
        <div class="card-body">
            <table id="datatablePersonal" class="table table-striped dt-responsive order-column">
                <thead>
                    <tr>
                        <th></th>
                        <th>Estado</th>
                        <th>Nombres</th>
                        <th>Usuario</th>
                        <th>Carnét de Identidad</th>
                        <th>Cargo</th>
                        <th>Teléfono</th>
                        <th>Correo Electrónico</th>
                        <th>Dirección</th>

                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th></th>
                        <th>Estado</th>
                        <th>Nombres</th>
                        <th>Usuario</th>
                        <th>Carnét de Identidad</th>
                        <th>Cargo</th>
                        <th>Teléfono</th>
                        <th>Correo Electrónico</th>
                        <th>Dirección</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>
                                <div class="form-check form-switch">
                                    <input data-id="{{ $user->id }}" class="form-check-input mi_checkbox"
                                    type="checkbox" data-onstyle="success" data-offstyle="danger"
                                    data-toggle="toggle" data-on="Active" data-off="InActive"
                                    {{ $user->estado ? 'checked' : '' }}>
                                    <label class="form-check-label" for="flexSwitchCheckDefault"></label>
                                </div>
                            </td>
                            <td id="resp{{ $user->id }}">
                                @if ($user->estado == 0 || empty($user->estado) || $user->estado == null)
                                    <span class="badge bg-danger">Inactivo</span>
                                @else
                                    <span class="badge bg-success">Activo</span>
                                @endif
                            </td>
                            <td>
                                @if (empty($user->name) || $user->name == null)
                                    <small class="bg-secondary rounded text-white-50 p-1 fst-italic">
                                        Sin Teléfono
                                    </small>
                                @else
                                    {{ $user->name }}
                                @endif
                            </td>
                            <td>
                                @if (empty($user->username) || $user->username == null)
                                    <small class="bg-secondary rounded text-white-50 p-1 fst-italic">
                                        Sin Teléfono
                                    </small>
                                @else
                                    {{ $user->username }}
                                @endif
                            </td>
                            <td>
                                @if (empty($user->ci) || $user->ci == null)
                                    <small class="bg-secondary rounded text-white-50 p-1 fst-italic">
                                        Sin C.I.
                                    </small>
                                @else
                                    {{ $user->ci }}
                                @endif
                            </td>
                            <td>
                                @if (empty($user->role->name) || $user->role->name == null)
                                    <small class="bg-secondary rounded text-white-50 p-1 fst-italic">
                                        Sin Teléfono
                                    </small>
                                @else
                                    {{ $user->role->name }}
                                @endif
                            </td>
                            <td>
                                @if (empty($user->telefono) || $user->telefono == null)
                                    <small class="bg-secondary rounded text-white-50 p-1 fst-italic">
                                        Sin Teléfono
                                    </small>
                                @else
                                    {{ $user->telefono }}
                                @endif
                            </td>
                            <td>
                                @if (empty($user->email) || $user->email == null)
                                    <small class="bg-secondary rounded text-white-50 p-1 fst-italic">
                                        Sin Teléfono
                                    </small>
                                @else
                                    {{ $user->email }}
                                @endif
                            </td>
                            <td>
                                @if (empty($user->direccion) || $user->direccion == null)
                                    <small class="bg-secondary rounded text-white-50 p-1 fst-italic">
                                        Sin Dirección
                                    </small>
                                @else
                                    {{ $user->direccion }}
                                @endif
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

    {{--  <script src="https://cdn.datatables.net/1.12.1/js/dataTables.semanticui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.8.8/semantic.min.js"></script>  --}}
    <script src="{{ asset('js/datatables.js') }}"></script>

    <script>
        $(document).ready(function () {
            $('.mi_checkbox').change(function() {
                //Verifica el estado del checkbox, si esta seleccionado sera igual a 1 de lo contrario sera igual a 0
                var estado = $(this).prop('checked') == true ? 1 : 0;
                var id = $(this).data('id');
                //console.log(estado);
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    //url: '/StatusNoticia',
                    url: '{{ route('personal.estado') }}',
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

    {{--  <script>
        $(document).ready(function() {
            $(".table-pasantes").hide();
            $(".table-voluntarios").hide();
            $(".pasantes").click(function() {
                $(".table-pasantes").show();
                $(".table-administrativos").hide();
                $(".table-voluntarios").hide();
            });
            $(".administrativos").click(function() {
                $(".table-administrativos").show();
                $(".table-pasantes").hide();
                $(".table-voluntarios").hide();
            });
            $(".voluntarios").click(function() {
                $(".table-voluntarios").show();
                $(".table-administrativos").hide();
                $(".table-pasantes").hide();
            });
        });
    </script>  --}}

    {{--  <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function() {
            // create post
            $('#create-post-btn').click(function() {
                $('.error').remove();
                $('#id').remove();
                $('#postModal #modalTitle').text('Registrar Pasante');
                $('#postForm')[0].reset();
                $('#postModal').modal('toggle');
            });

            // form validate and submit
            $('#postForm').validate({
                rules: {
                    name: 'required',
                    telefono: 'required',
                    direccion: 'required',
                    universidad: 'required',
                    fecha_inicio: 'required',
                    fecha_final: 'required',
                },
                messages: {
                    name: 'Por favor, escriba el nombre',
                    telefono: 'Por favor, digite el teléfono',
                    direccion: 'Por favor, escriba la dirección',
                    universidad: 'Por favor, escriba la universidad',
                    fecha_inicio: 'Por favor, indique la fecha inicial',
                    fecha_final: 'Por favor, indique la fecha de culminación',
                },

                submitHandler: function(form) {
                    const id = $('input[name=id]').val();
                    const formData = $(form).serializeArray();

                    $.ajax({
                        url: 'personal',
                        type: 'POST',
                        data: formData,
                        success: function(response) {
                            //window.location.reload(true);
                            if (response && response.status === 'success') {

                                // clear form
                                $('#postForm')[0].reset();

                                // toggle modal
                                $('#postModal').modal('toggle');

                                $('#datatablePasantes p').empty();

                                const data = response.data;

                                if (id) {
                                    $("#pasante_" + id + " td:nth-child(1)").html(data
                                    .name);
                                    $("#pasante_" + id + " td:nth-child(2)").html(data
                                        .telefono);
                                    $("#pasante_" + id + " td:nth-child(3)").html(data
                                        .direccion);
                                    $("#pasante_" + id + " td:nth-child(4)").html(data
                                        .universidad);
                                    $("#pasante_" + id + " td:nth-child(5)").html(data
                                        .fecha_inicio);
                                    $("#pasante_" + id + " td:nth-child(6)").html(data
                                        .fecha_final);
                                    $("#pasante_" + id + " td:nth-child(7)").html(data
                                        .estado);
                                } else {
                                    $('#datatablePasantes').prepend(
                                        `<tr id=${'pasante_'+data.id}><td>${data.name}</td><td>${data.telefono}</td><td>${data.direccion}</td><td>${data.universidad}</td><td>${data.fecha_inicio}</td><td>${data.fecha_final}</td><td>${data.estado}</td>
                                        <td>
                                            <div class="d-flex justify-content-between">
                                                <a href="javascript:void(0)"
                                                    class="bg-warning text-white mx-2 py-1 px-2 rounded-pill btn-edit"
                                                    data-id="${data.id}">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </a>
                                                <a href="javascript:void(0)"
                                                    class="bg-danger text-white mx-2 py-1 px-2 rounded-pill btn-delete"
                                                    data-id="${data.id}">
                                                    <i class="fa-solid fa-trash-can"></i>
                                                </a>
                                            </div>
                                        </td></tr>`
                                    );
                                }
                            }
                        }
                    });
                }
            })

            $('#datatablePasantes').on('click', '.btn-edit', function (e) {
                e.preventDefault();
                const id = $(this).data('id');
                console.log(id);
                $('label.error').remove();
                $('input[name=name]').removeClass('error');
                $('input[name=name]').after('<input type="hidden" name="id" value="' + id + '" />')
                $('input[name=telefono]').removeClass('error');
                $('input[name=name]').removeAttr('disabled');
                $('input[name=telefono]').removeAttr('disabled');
                $('textarea[name=direccion]').removeClass('error');
                $('input[name=telefono]').removeAttr('disabled');
                $('textarea[name=direccion]').removeAttr('disabled');
                $('input[name=universidad]').removeClass('error');
                $('textarea[name=direccion]').removeAttr('disabled');
                $('input[name=universidad]').removeAttr('disabled');
                $('input[name=fecha_inicio]').removeClass('error');
                $('input[name=universidad]').removeAttr('disabled');
                $('input[name=fecha_inicio]').removeAttr('disabled');
                $('input[name=fecha_final]').removeClass('error');
                $('input[name=fecha_inicio]').removeAttr('disabled');
                $('input[name=fecha_final]').removeAttr('disabled');
                $('#postModal button[type=submit]').removeClass('d-none');
                /*$('label.error').remove();
                $('input[name=name]').removeClass('error');
                $('input[name=name]').after('<input type="hidden" name="id" value="' + id + '" />')
                $('input[name=telefono]').removeClass('error');
                $('input[name=name]').removeAttr('disabled');
                $('input[name=telefono]').removeAttr('disabled');
                $('#postModal button[type=submit]').removeClass('d-none');*/
    
    
                $.ajax({
                    url: `personal/${id}`,
                    type: 'get',
                    success: function(response) {
                        console.log(response.data);
                        if (response && response.status === 'success') {
                            const data = response.data;
                            $('#postModal #modalTitle').text('Modificar Datos');
                            $('#postModal #name').val(data.name);
                            $('#postModal #telefono').val(data.telefono);
                            $('#postModal textarea[name=direccion]').val(data.direccion);
                            $('#postModal input[name=universidad]').val(data.universidad);
                            $('#postModal input[name=fecha_inicio]').val(data.fecha_inicio);
                            $('#postModal input[name=fecha_final]').val(data.fecha_final);
                            $('#postModal').modal('toggle');
                        }
                    }
                })
            });
    
            // delete button click
            $('#datatablePasantes').on('click', '.btn-delete', function (e) {
                //e.preventDefault();
                const id = $(this).data('id');
                if (id) {
                    const result = window.confirm('¿Está segura de eliminar este pasante?');
                    if (result) {
                        $.ajax({
                            url: `personal/${id}`,
                            type: 'DELETE',
                            success: function(response) {
                                 //window.location.reload(true);
                                if (response && response.status === 'success') {
                                    const data = response.data;
                                    $(`#pasante_${data.id}`).remove();
                                    if(window.location.reload(true));
                                }
                            }
                        });
                    } else {
                        console.log('error', 'Pasante no encontrado');
                    }
                }
            });
        });

        // view button click
        /*$('.btn-view').click(function() {
            const id = $(this).data('id');
            $('label.error').remove();
            $('input[name=title]').removeClass('error');
            $('textarea[name=description]').removeClass('error');
            $('input[name=title]').attr('disabled', 'disabled');
            $('textarea[name=description]').attr('disabled', 'disabled');
            $('#postModal button[type=submit]').addClass('d-none');

            $.ajax({
                url: `posts/${id}`,
                type: 'GET',
                success: function(response) {
                    if (response && response.status === 'success') {
                        const data = response.data;
                        $('#postModal #modalTitle').text('Post Detail');
                        $('#postModal input[name=title]').val(data.title);
                        $('#postModal textarea[name=description]').val(data.description);
                        $('#postModal').modal('toggle');
                    }
                }
            })
        });*/

        // edit button click

        /*$('.btn-edit').click(function() {

        });*/
        
        /*$('.btn-delete').click(function() {
        });*/
    </script>  --}}
@endpush
