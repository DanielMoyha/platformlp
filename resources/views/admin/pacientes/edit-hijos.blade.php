@extends('layouts.dashboard')

@section('titulo')
    Designar Encargada a los Hijos
@endsection

@push('styles')
    <!-- CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/css/toastr.css" rel="stylesheet" />
@endpush

@section('content')
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Crear Hijos</li>
    </ol>

    <div class="row" onload="RenderInputs()">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nombres:</strong>
                {{ $hijo->paciente->nombres }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Hijos:</strong>
                {{ $hijo->paciente->cantidad_hijos }}
            </div>
        </div>

        <!--Cantidad de Hijos-->
        <div class="col-md-3 mb-2">
            <label for="cantidad_hijos" class="form-label">Cantidad de Hijos</label>
            <input type="number" class="form-control" id="cantidad_hijos" name="cantidad_hijos" min="0"
                placeholder="Introduzca la cantidad de Hijos que tiene" value="{{ $hijo->paciente->cantidad_hijos }}">
            <div class="invalid-feedback">
                Introduzca la cantidad de Hijos
            </div>
        </div>

        <!--START Car Group 2 - Hijos -->

        <form action="{{ route('paciente.hijos.update', $hijo->id) }}" method="POST">
            @csrf
            @method('patch')
            <div class="row d-flex justify-content-start mb-3" id="content-hijos"></div>

            <button type="submit" class="btn btn-success">Actualizar</button>
        </form>
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
                });
            });
        
            function RenderInputs(cantidad) {
                $("#content-hijos").html("");
        
                for (let i = 0; i < cantidad; i++) {
                    // $("#content-hijos").append('<form class="form">');
                    $("#content-hijos").append(`
                        <div class="card-group mb-3">
                            <div class="card">
                                <div class="card-body d-flex justify-content-start">
                                    <input name="paciente_id[]" type="text" value="{{ $hijo->paciente->id }}" hidden>
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
        });
    </script>

@endpush
