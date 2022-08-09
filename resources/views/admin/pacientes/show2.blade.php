@extends('layouts.dashboard')

@section('titulo')
    Ver datos de los Hijos(a)
@endsection

@push('styles')
    <!-- CSS -->
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/css/toastr.css" rel="stylesheet" /> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
@endpush

@section('content')
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Mostrando los hijos(as) registrados</li>
    </ol>
    @if ($message = Session::get('success'))
        <div class="position-fixed bottom-0 end-0 py-3 px-1" style="z-index: 11">
            <div class="toast align-items-center text-white bg-success" role="alert" aria-live="assertive" aria-atomic="true"
                data-bs-delay="3500">
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

    <div class="card shadow border-0 mb-4">
        <div class="card-header text-white text-center bg-info fw-bold h5"><i class="fa-solid fa-clipboard-list"></i> Datos del Caso</div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <label class="form-label fw-bold-600"><i class="fa-solid fa-hashtag"></i> Número de Caso: </label>
                    <span class="text-muted fst-italic">{{ $paciente->caso }}</span>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold-600"><i class="fa-solid fa-children"></i> Cantidad de Hijos: </label>
                    <span class="text-muted fst-italic">{{ $paciente->cantidad_hijos }}</span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label class="form-label fw-bold-600">
                        <i class="fa-solid fa-address-card"></i> Nombre Completo <span class="text-muted fst-italic">(Padres o Tutores)</span>:
                    </label>
                </div>
                <div class="col-md-6">
                    <ul>
                        <li class="text-muted fst-italic">{{ $paciente->nombres }}</li>
                        <li class="text-muted fst-italic">{{ $paciente->nombre_esposo }}</li>
                    </ul>
                </div>
                <div class="col-md-12">
                    <label class="form-label fw-bold-600"><i class="fa-solid fa-file-lines"></i> Motivo de la Consulta: </label>
                    <div class="text-muted fst-italic">{{ $paciente->motivo_consulta }}</div>
                </div>
            </div>
        </div>
        <div class="card-footer bg-transparent d-md-flex justify-content-end text-center">
            <a href="{{ route('home') }}" class="btn btn-danger m-0 fw-bold mx-2"><i class="fa-solid fa-house"></i> Inicio</a>

            <a href="{{ route('hijos') }}" class="btn fw-bold text-white mt-2 mt-md-0" style="background-color: #1dc6bc"><i class="fa-solid fa-table-list"></i> Lista de Asignaciones</a>
        </div>
    </div>

    <div class="row mb-4">
        <div class="table-responsive">
            <table class="table table-striped rounded-3 shadow" style="overflow: hidden;">
                <thead class="text-white text-center" style="background-color: #47908b">
                    <tr>
                        <th>Nombres del Hijo(a)</th>
                        <th>Sexo</th>
                        <th>Edad</th>
                        <th>Encargada</th>
                        <th>Modificar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($paciente->hijos as $hijo)
                        <tr class="text-center">
                            {{--  --}}
                            <td>
                                @if (empty($hijo->nombre) || $hijo->nombre == null)
                                    <small class="bg-secondary rounded text-white-50 p-1 fst-italic">
                                        Sin nombre
                                    </small>
                                @else
                                    {{ $hijo->nombre }}
                                @endif
                            </td>
                            <td>
                                @if (empty($hijo->sexo) || $hijo->sexo == null)
                                    <small class="bg-secondary rounded text-white-50 p-1 fst-italic">
                                        Sin sexo
                                    </small>
                                @else
                                    @if ($hijo->sexo == "Masculino")
                                        <span><i class="fa-solid fa-mars"></i> {{ $hijo->sexo }}</span>
                                    @else
                                        <span><i class="fa-solid fa-venus"></i> {{ $hijo->sexo }}</span>
                                    @endif
                                @endif
                            </td>
                            <td>
                                @if (empty($hijo->edad) || $hijo->edad == null)
                                    <small class="bg-secondary rounded text-white-50 p-1 fst-italic">
                                        Sin edad
                                    </small>
                                @else
                                    {{ $hijo->edad }}
                                @endif
                            </td>
                            <td>
                                @if ($hijo->user_id)
                                    <span class="badge bg-success fst-italic small">
                                        {{ $hijo->user->name }}
                                    </span>
                                @else
                                    <span class="badge bg-danger">Sin Encargada</span>
                                @endif
                            </td>
                            <td>
                                <a href="javascript:void(0)" id="btn_editHijo" class="btn btn-warning p-1 edit"
                                    data-id="{{ $hijo->id }}" data-bs-toggle="modal" data-bs-target="#editModal">
                                    <i class="fa-solid fa-user-pen"></i>
                                </a>

                                {{-- <a href="{{ route('paciente.hijos.edit', $hijo->id) }}" class="btn btn-warning p-1">
                                    <i class="fa-solid fa-user-pen"></i>
                                </a> --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="editModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #ffe98f">
                    <h5 class="modal-title fw-bold" id="editModalLabel">Datos del Hijo(a)</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formHijo" name="formHijo" class="form-horizontal">
                        <input type="hidden" name="id" id="id">
                        <input type="hidden" name="paciente_id" id="paciente_id">
                        <div class="form-group">
                            <label for="nombre" class="col-sm-12 control-label fw-bold-600">Nombre Completo</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="nombre" name="nombre"
                                    placeholder="Nombre Completo del Hijo(a)" value="" maxlength="50" required="">
                            </div>
                        </div>
                        <div class="form-group mt-1">
                            <label for="sexo" class="col-sm-2 control-label fw-bold-600">Sexo</label>
                            <div class="col-sm-12">
                                {{-- <input type="text" class="form-control" id="code" name="code"
                                    placeholder="Enter Book Code" value="" maxlength="50" required=""> --}}
                                <select class="form-select" id="sexo" name="sexo" required>
                                    <option selected disabled>-- Seleccione --</option>
                                    <option value="Masculino">Masculino</option>
                                    <option value="Femenino">Femenino</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group mt-1">
                            <label for="edad_hijo" class="col-sm-2 control-label fw-bold-600">Edad</label>
                            <div class="col-sm-12">
                                {{-- <input type="text" class="form-control" id="author" name="author"
                                    placeholder="Enter author Name" value="" required=""> --}}
                                <input type="number" class="form-control" id="edad_hijo" name="edad" min="0"
                                    placeholder="Edad del hijo(a)" required />
                            </div>
                        </div>
                        <div class="form-group mt-1">
                            <label for="user_id" class="col-sm-2 control-label fw-bold-600">Encargada</label>
                            <div class="col-sm-12">
                                <select name="user_id" class="form-control" id="user_id">
                                    <option value=""> -- Seleccione --</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">
                                            {{ $user->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fa-solid fa-circle-xmark"></i> Cancelar</button>
                    <button type="submit" class="btn btn-success" id="submit"><i class="fa-solid fa-circle-check"></i> Actualizar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- end modal -->
@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    {{-- <script>
        $(document).ready(function() {
            
            
            /** Generar campos por la cantidad de hijos */
            $(function () {
                $("#cantidad_hijos").keyup(function () {
                    let cantidad = $("#cantidad_hijos").val();
                    RenderInputs(cantidad);
                }).trigger('keyup');
            });
        
            function RenderInputs(cantidad) {
                $("#content-hijos").html("");
        
                for (let i = 0; i < cantidad; i++) {
                    // $("#content-hijos").append('<form class="form">');
                    $("#content-hijos").append(`
                        <div class="card-group mb-3">
                            <div class="card">
                                <div class="card-body d-md-flex justify-content-start">
                                    <input name="paciente_id[]" type="text" value="{{ $paciente->id }}" hidden>
                                    <div class="col-md-5 mb-2 mx-2">
                                        <label
                                            for="nombre_hijo` + (i + 1) +`"
                                            class="form-label fw-bold">
                                                Nombre del Hijo(a)
                                        </label>

                                        <input
                                            type="text"
                                            class="form-control"
                                            id="nombre_hijo` + (i + 1) +`"
                                            name="nombre[]
                                            placeholder="Nombre Completo de su hijo(a)"
                                            value="{{ $hijo->nombre }}"
                                            required
                                        />
                                    </div>
                                    <div class="col-md-2 mb-2 mx-2">
                                        <label
                                            for="edad_hijo` + (i + 1) +`"
                                            class="form-label fw-bold">
                                                Edad
                                        </label>
                                        <input
                                            type="number"
                                            class="form-control"
                                            id="edad_hijo` + (i + 1) +`"
                                            name="edad[]"
                                            min="0"
                                            placeholder="Edad del hijo(a)"
                                            value="{{ $hijo->edad }}"
                                            required
                                        />
                                    </div>
        
                                    <div class="col-md-2 mb-2 mx-2">
                                        <label for="sexo-hijo` +
                                        (i + 1) +
                                        `" class="form-label fw-bold">Sexo</label>
                                        <select class="form-select" id="sexo-hijo` +
                                        (i + 1) +
                                        `" name="sexo[]" required>
                                            <option selected disabled>-- Seleccione --</option>
                                            <option value="Masculino" {{ $hijo->sexo == 'Masculino' ? 'selected' : '' }}>Masculino</option>
                                            <option value="Femenino" {{ $hijo->sexo == 'Femenino' ? 'selected' : '' }}>Femenino</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Elija el sexo del hijo(a), por favor.
                                        </div>
                                    </div>

                                    <div class="col-md-2 mb-2 mx-2">
                                        <label for="asignar" class="col-form-label fw-bold">Encargada:</label>
                                        <select name="user_id[]" class="form-control">
                                            <option value=""> -- Seleccione --</option>
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}" {{ $hijo->user_id == $user->id ? 'selected' : '' }}>
                                                    {{ $user->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    `);
                }
            }
            $(function(){
                $('div[onload]').trigger('onload');
            });
        });
    </script> --}}

    {{-- <script type="text/javascript">
        $(document).ready(function($) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            

            $('body').on('click', '.edit', function() {
                var id = $(this).data('id');

                // ajax
                $.ajax({
                    type: "GET",
                    url: "{{ route('hijo.edit') }}",
                    data: {
                        id: id
                    },
                    dataType: 'json',
                    success: function(res) {
                        //$('#editModal').modal('show');
                        $('#id').val(res.id);
                        $('#paciente_id').val(res.paciente_id);
                        $('#nombre').val(res.nombre);
                        $('#sexo').val(res.sexo);
                        $('#edad_hijo').val(res.edad);
                        $('#user_id').val(res.user_id);
                    }
                });
            });
            $('body').on('click', '#btn-save', function(event) {
                var id = $("#id").val();
                var paciente_id = $("#paciente_id").val();
                var nombre = $("#nombre").val();
                var sexo = $("#sexo").val();
                var edad_hijo = $("#edad_hijo").val();
                var user_id = $("#user_id").val();
                $("#btn-save").html('Actualizando...');
                $("#btn-save").attr("disabled", true);

                // ajax
                $.ajax({
                    type: "POST",
                    url: "{{ route('hijo.update') }}",
                    data: {
                        id: id,
                        paciente_id: paciente_id,
                        nombre: nombre,
                        sexo: sexo,
                        edad_hijo: edad_hijo,
                        user_id: user_id,
                    },
                    dataType: 'json',
                    success: function(res) {
                        console.log(res);
                        //window.location.reload();
                        $("#btn-save").html('Submit');
                        $("#btn-save").attr("disabled", false);
                    }
                });
            });
        });
    </script> --}}
    <script>
        $(document).ready(function() {
            $(".toast").toast('show');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('body').on('click', '#submit', function(event) {
                event.preventDefault();
                var id = $("#id").val();
                var paciente_id = $("#paciente_id").val();
                var nombre = $("#nombre").val();
                var sexo = $("#sexo").val();
                var edad = $("#edad_hijo").val();
                var user_id = $("#user_id").val();
                $("#submit").html('Actualizando...');
                $("#submit").attr("disabled", true);

                $.ajax({
                    url: '/casos-hijo/' + id,
                    type: "POST",
                    data: {
                        id: id,
                        paciente_id: paciente_id,
                        nombre: nombre,
                        sexo: sexo,
                        edad: edad,
                        user_id: user_id,
                    },
                    dataType: 'json',
                    success: function(data) {
                        $('#formHijo').trigger("reset");
                        $('#editModal').modal('hide');
                        window.location.reload(true);
                    }
                });
            });


            
            $('body').on('click', '#btn_editHijo', function(event) {
                event.preventDefault();
                var id = $(this).data('id');
                console.log(id);
                $.get('/casos-hijo/' + id + '/edit', function(data) {
                    //$('#userCrudModal').html("Edit category");
                    $('#submit').val("Actualizar");
                    $('#editModal').modal('show');
                    $('#id').val(data.data.id);
                    $('#paciente_id').val(data.data.paciente_id);
                    $('#nombre').val(data.data.nombre);
                    $('#sexo').val(data.data.sexo);
                    $('#edad_hijo').val(data.data.edad);
                    $('#user_id').val(data.data.user_id);
                });
            });


        });
    </script>
@endpush
