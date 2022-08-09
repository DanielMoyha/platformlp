@extends('layouts.dashboard')

@section('titulo')
    Registro de Hijos(as)
@endsection

@push('styles')
    <!-- CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/css/toastr.css" rel="stylesheet" />
@endpush

@section('content')
    {{--  ESTE FORMULARIO PARA CREAR LOS HIJOS, ES DECIR CUANDO EL PACIENTE NO TIENE NINGÚN HIJO CREADO EN LA BASE DE DATOS, y utilizar el otros formulario 'show2' para mostrar y traer el formulario de los hijos ya asignados en la BD  --}}
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Registre los datos de los hijos del caso que seleccionó</li>
    </ol>

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
                    <span class="text-muted fst-italic fw-bold">{{ $paciente->cantidad_hijos }} hijos(as)</span>
                    <input
                        type="hidden"
                        class="form-control"
                        id="cantidad_hijos"
                        name="cantidad_hijos"
                        min="0"
                        placeholder="Introduzca la cantidad de Hijos que tiene"
                        value="{{ $paciente->cantidad_hijos }}"
                        disabled
                    />
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
                <div class="col-md-6">
                    <label class="form-label fw-bold-600"><i class="fa-solid fa-highlighter"></i> Diagnóstico Social: </label>
                    <div class="text-muted fst-italic">{{ $paciente->diagnostico_social }}</div>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold-600"><i class="fa-solid fa-file-lines"></i> Motivo de la Consulta: </label>
                    <div class="text-muted fst-italic">{{ $paciente->motivo_consulta }}</div>
                </div>
            </div>
        </div>
    </div>


        <!--START Card Group 2 - Hijos -->
        {{--  @foreach ($a as $aa)
            {{ $aa->nombre }}<br>
        @endforeach  --}}
        {{--  El foreach de arriba trae solo el nombre de los hijos del paciente  --}}
        <div class="card shadow border-0 rounded-3 mb-5">
            <div class="card-header text-center text-white fw-bold h4" style="background-color: #47908b">Formulario de Registro para Hijos</div>

            @if ($paciente->cantidad_hijos == 0)
                <div class="alert alert-warning shadow-sm mx-4 mt-4" role="alert">
                    <h4 class="alert-heading"><i class="fa-solid fa-circle-exclamation"></i> Aviso</h4>
                    <p>Usted no puede registrar a los hijos, porque este <strong>caso tiene {{ $paciente->cantidad_hijos }} hijos.</strong> Si piensa que es un error, por favor modifique la <span class="fst-italic">cantidad de hijos</span> que tiene este caso <a href="{{ route('paciente.edit', [$paciente->id]) }}">(N° {{ $paciente->caso }})</a> para poder registrar los datos que desea.</p>
                </div>
                <div class="text-end mb-3">
                    <a href="{{ route('home') }}" class="btn btn-danger fw-bold-600 mx-2"><i class="fa-solid fa-arrow-left"></i> Volver</a>
                </div>
            @else
                <form action="{{ route('paciente.hijos.store') }}" method="POST" autocomplete="off">
                    @csrf

                    <div class="row d-flex justify-content-start" id="content-hijos"></div>

                    <div class="card-footer d-flex align-items-center justify-content-end bg-transparent">
                        <a href="{{ route('home') }}" class="btn btn-danger fw-bold mx-2"><i class="fa-solid fa-circle-xmark"></i> Cancelar</a>
                        <button type="submit" class="btn btn-success fw-bold" id="submit"><i class="fa-solid fa-circle-check"></i> Guardar</button>
                    </div>
                </form>

            @endif
        </div>
@endsection

@push('scripts')
    <script>
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
                            <div class="card shadow">
                                <div class="card-body d-md-flex justify-content-around">
                                    <input name="paciente_id[]" type="text" value="{{ $paciente->id }}" hidden>
                                    <div class="col-md-4 mb-2">
                                        <label
                                            for="nombre_hijo` + (i + 1) +`"
                                            class="form-label fw-bold">
                                                Nombre del Hijo(a)
                                        </label>

                                        <input
                                            type="text"
                                            class="form-control @error('nombre[]') is-invalid @enderror"
                                            id="nombre_hijo` + (i + 1) +`"
                                            name="nombre[]
                                            value="{{ old('nombre[]') }}"
                                            placeholder="Nombre Completo de su hijo(a)"
                                            required
                                        />
                                        @error('nombre[]')
                                            <p class="bg-danger text-white my-2 rounded-lg text-sm p-2 text-center">
                                                {{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-2 mb-2">
                                        <label
                                            for="edad_hijo` + (i + 1) +`"
                                            class="form-label fw-bold">
                                                Edad
                                        </label>
                                        <input
                                            type="number"
                                            class="form-control @error('edad[]') is-invalid @enderror"
                                            id="edad_hijo` + (i + 1) +`"
                                            name="edad[]"
                                            min="0"
                                            value="{{ old('edad[]') }}"
                                            placeholder="Edad del hijo(a)"
                                            required
                                        />
                                        @error('edad[]')
                                            <p class="bg-danger text-white my-2 rounded-lg text-sm p-2 text-center">
                                                {{ $message }}</p>
                                        @enderror
                                    </div>
        
                                    <div class="col-md-2 mb-2">
                                        <label for="sexo-hijo`+(i + 1)+`" class="form-label fw-bold">Sexo</label>
                                        <select class="form-select @error('sexo[]') is-invalid @enderror" id="sexo-hijo` + (i + 1) + `" name="sexo[]" required>
                                            <option selected disabled>-- Seleccione --</option>
                                            <option value="Masculino" {{ old('sexo[]') == 'Masculino' ? 'selected' : '' }}>Masculino</option>
                                            <option value="Femenino" {{ old('sexo[]') == 'Femenino' ? 'selected' : '' }}>Femenino</option>
                                        </select>
                                        @error('sexo[]')
                                            <p class="bg-danger text-white my-2 rounded-lg text-sm p-2 text-center">
                                                {{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="col-md-2 mb-2">
                                        <label for="user_id` +(i + 1) +`" class="form-label fw-bold">Encargada:</label>
                                        <select name="user_id[]" class="form-control @error('user_id[]') is-invalid @enderror" id="user_id` + (i + 1) + `">
                                            <option value="" class="text-muted">* Sin Encargada *</option>
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}" {{ old('user_id[]') == '$user->id' ? 'selected' : '' }}>
                                                    {{ $user->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('user_id[]')
                                            <p class="bg-danger text-white my-2 rounded-lg text-sm p-2 text-center">
                                                {{ $message }}</p>
                                        @enderror
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
    </script>

@endpush
