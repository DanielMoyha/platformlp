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
    <div class="row mb-3">
        <div class="col-md-6">
            {{--  <button class="btn btn-secondary administrativos">Ver Administrativos</button>
            <button class="btn btn-secondary pasantes">Ver Pasantes</button>
            <button class="btn btn-secondary voluntarios mt-2 mt-md-0">Ver Voluntarios</button>  --}}
            <a href="{{ route('personal') }}" class="btn btn-secondary">Ver Administrativos</a>
            <a href="{{ route('pasante') }}" class="btn btn-secondary">Ver Pasantes</a>
            <a href="{{ route('voluntario') }}" class="btn btn-secondary mt-2 mt-md-0">Ver Voluntarios</a>
        </div>
    </div>

    <!-- Datatable - Pasantes -->
    <div class="card mb-4 border-info table-pasantes">
        <div class="card-header d-md-flex justify-content-between bg-info">
            <div class="my-2">
                <i class="fas fa-table me-1"></i>
                <span class="h5 text-dark">Listado de los Pasantes en la Institución</span>
            </div>
            <div class="">
                <a href="javascript:void(0)" id="create-post-btn" class="btn btn-success fw-bold">Registrar Nuevo</a>
            </div>
        </div>
        <div class="card-body">
            <table id="datatablePasantes" class="table table-striped dt-responsive order-column">
                <thead>
                    <tr>
                        {{-- <th>N°</th> --}}
                        <th></th>
                        <th>Estado</th>
                        <th>Nombre Completo</th>
                        <th>Teléfono</th>
                        <th>Dirección</th>
                        <th>Universidad</th>
                        <th>Fecha de Inicio</th>
                        <th>Fecha Final</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tfoot>
                    {{-- <th>N°</th> --}}
                    <tr>
                        <th></th>
                        <th>Estado</th>
                        <th>Nombre Completo</th>
                        <th>Teléfono</th>
                        <th>Dirección</th>
                        <th>Universidad</th>
                        <th>Fecha de Inicio</th>
                        <th>Fecha Final</th>
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
                            <td>
                                @if (empty($pasante->fecha_inicio) || $pasante->fecha_inicio == null)
                                    <small class="bg-secondary rounded text-white-50 p-1 fst-italic">
                                        Sin Fecha Inicial
                                    </small>
                                @else
                                    {{ $pasante->fecha_inicio }}
                                @endif
                            </td>
                            <td>
                                @if (empty($pasante->fecha_final) || $pasante->fecha_final == null)
                                    <small class="bg-secondary rounded text-white-50 p-1 fst-italic">
                                        Sin Fecha Inicial
                                    </small>
                                @else
                                    {{ $pasante->fecha_final }}
                                @endif
                            </td>
                            {{--  <td>
                                @if (empty($pasante->estado) || $pasante->estado == null)
                                    <small class="bg-secondary rounded text-white-50 p-1 fst-italic">
                                        Sin Estado
                                    </small>
                                @else
                                    {{ $pasante->estado }}
                                @endif
                            </td>  --}}
                            <td>
                                <div class="d-flex justify-content-between">
                                    <a href="javascript:void(0)"
                                        class="bg-warning text-white mx-2 py-1 px-2 rounded-pill btn-edit"
                                        data-id="{{ $pasante->id }}">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <a href="javascript:void(0)"
                                        class="bg-danger text-white mx-2 py-1 px-2 rounded-pill btn-delete"
                                        data-id="{{ $pasante->id }}">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- modal -->
            <div class="modal fade" id="postModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content ">
                        <form method="post" id="postForm" autocomplete="off">
                            <div class="modal-header bg-info fw-bold">
                                <h5 class="modal-title text-white text-center" id="modalTitle"></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="d-md-flex justify-content-between">
                                        <div class="col-md-12">
                                            <!-- NOMBRES -->
                                            <label for="name" class="form-label fw-bold text-uppercase">Nombres</label>

                                            <input id="name" name="name" type="text" class="form-control"
                                                value="" required autofocus placeholder="Nombre Completo del pasante">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="d-md-flex justify-content-between">
                                        <div class="col-md-4">
                                            <!-- TELÉFONO -->
                                            <label for="telefono"
                                                class="form-label fw-bold text-uppercase">{{ __('Teléfono') }}</label>

                                            <input id="telefono" type="number" class="form-control" name="telefono"
                                                value="" required autofocus placeholder="N° Celular del pasante">
                                        </div>

                                        <!-- UNIVERSIDAD -->
                                        <div class="col-md-7">
                                            <label for="universidad"
                                                class="form-label fw-bold text-uppercase">{{ __('Universidad') }}</label>

                                            <input id="universidad" type="text" class="form-control"
                                                name="universidad" value="" required autofocus
                                                placeholder="Escriba la Universidad al que pertenece pasante">

                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <!-- DIRECCIÓN -->
                                        <label for="direccion"
                                            class="form-label fw-bold text-uppercase">{{ __('Dirección') }}</label>

                                        <textarea name="direccion" id="direccion" class="form-control" rows="3" required autofocus
                                            placeholder="Escriba la dirección del pasante"></textarea>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="d-md-flex justify-content-around">
                                        <!-- FECHA INICIO -->
                                        <div class="col-md-5">
                                            <label for="fecha_inicio"
                                                class="form-label fw-bold text-uppercase">{{ __('Fecha de Inicio') }}</label>

                                            <input
                                                class="form-control"
                                                type="date"
                                                name="fecha_inicio" id="fecha_inicio"
                                                placeholder="Escriba la dirección por favor"
                                                value=""
                                                required
                                            >
                                        </div>

                                        <!-- FECHA FINALL -->
                                        <div class="col-md-5">
                                            <label for="fecha_final"
                                                class="form-label fw-bold text-uppercase">{{ __('Fecha de Culminación') }}</label>

                                            <input
                                                class="form-control"
                                                type="date"
                                                name="fecha_final"
                                                id="fecha_final"
                                                placeholder="Escriba la dirección por favor"
                                                value=""
                                                required
                                            >
                                        </div>
                                    </div>
                                </div>
                                {{--  <div>
                                    <div class="col-md-12">

                                        <div class="row mb-3">

                                            <input id="estado" type="hidden" class="form-control" name="estado"
                                                value="1">
                                        </div>
                                    </div>
                                </div>  --}}
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-success">Guardar Cambios</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
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
                        url: 'pasante',
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
                                window.location.reload();
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
                    url: `pasante/${id}`,
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
                            url: `pasante/${id}`,
                            type: 'DELETE',
                            success: function(response) {
                                 //window.location.reload(true);
                                if (response && response.status === 'success') {
                                    const data = response.data;
                                    $(`#pasante_${data.id}`).remove();
                                    window.location.reload(true);
                                }
                            }
                        });
                    } else {
                        console.log('error', 'Pasante no encontrado');
                    }
                }
            });


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
    </script>
@endpush
