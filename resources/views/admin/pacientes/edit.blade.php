@extends('layouts.dashboard')

@section('titulo')
    Modificar Caso
@endsection

@push('styles')
    <!-- CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/css/toastr.css" rel="stylesheet" />

    <style>
        .error {
            color: #FF0000;
        }
    </style>
@endpush

@section('content')
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Editar datos del caso seleccionado</li>
    </ol>
    <div class="card border-0 mb-5 shadow bg-transparent">
        <div class="card-header text-center bg-info text-white fw-bold h4">
            <i class="fa-solid fa-file-signature"></i> Atención de Caso - Trabajo Social
        </div>
        {{-- <form class="needs-validation" action="{{ route('paciente.store') }}" method="POST" novalidate> --}}
        <form action="{{ route('paciente.update', $paciente->id) }}" method="POST" autocomplete="off" id="formPacientes">
            @method('patch')
            @csrf

            <!--START Card group 1-->
            <div class="card-group mb-3">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <div class="row d-flex justify-content-between mb-3 mt-1">
                            <!--N° Caso-->
                            <div class="col-md-12 mb-2">
                                <label class="visually-hidden" for="caso">Caso</label>
                                <div class="input-group">
                                    <div class="input-group-text">N° Caso</div>
                                    <input
                                        type="number"
                                        class="form-control @error('caso') is-invalid @enderror"
                                        id="caso"
                                        placeholder="Número de caso"
                                        name="caso"
                                        value="{{ old('caso', $paciente->caso) }}"
                                        min="0" required readonly
                                    >
                                    @error('caso')
                                        <p class="bg-danger text-white my-2 rounded-lg text-sm p-2 text-center">
                                            {{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <!--Fecha-->
                            <div class="col-md-7 mb-2">
                                <label class="form-label fw-bold" for="fecha">Fecha</label>
                                <div class="input-group">
                                    {{-- <div class="input-group-text">Fecha</div> --}}
                                    <input type="date" class="form-control @error('fecha') is-invalid @enderror"
                                        id="fecha" name="fecha" value="{{ old('fecha', $paciente->fecha) }}" required>
                                    @error('fecha')
                                        <p class="bg-danger text-white my-2 rounded-lg text-sm p-2 text-center">
                                            {{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <!--Hora-->
                            <div class="col-md-5 mb-2">
                                <label class="form-label fw-bold" for="hora">Hora</label>
                                <div class="input-group">
                                    {{-- <div class="input-group-text">Hora</div> --}}
                                    <input type="time" class="form-control @error('hora') is-invalid @enderror"
                                        id="hora" name="hora" value="{{ old('hora', $paciente->hora) }}" required>
                                    @error('hora')
                                        <p class="bg-danger text-white my-2 rounded-lg text-sm p-2 text-center">
                                            {{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row d-flex justify-content-between mb-2">
                            <!--Nombre Completo-->
                            <div class="col-md-12 mb-2">
                                <label for="nombres" class="form-label @error('nombres') is-invalid @enderror fw-bold">Nombres
                                    Completo
                                    <span class="text-muted fst-italic small">(Madre o Padre o Tutor)</span></label>
                                <input type="text" class="form-control" id="nombres" name="nombres"
                                    placeholder="Nombre Completo" value="{{ old('nombres', $paciente->nombres) }}" required>
                                @error('nombres')
                                    <p class="bg-danger text-white my-2 rounded-lg text-sm p-2 text-center">
                                        {{ $message }}</p>
                                @enderror
                            </div>

                            <!--Edad-->
                            <div class="col-md-4 mb-2">
                                <label for="edad"
                                    class="form-label @error('edad') is-invalid @enderror fw-bold">Edad</label>
                                <input type="number" class="form-control" id="edad" name="edad"
                                    value="{{ old('edad', $paciente->edad) }}" min="0" placeholder="Edad" required>
                                @error('edad')
                                    <p class="bg-danger text-white my-2 rounded-lg text-sm p-2 text-center">
                                        {{ $message }}</p>
                                @enderror
                            </div>

                            <!--Sexo-->
                            <div class="col-md-8 mb-2 p-md-0">
                                <label for="sexo"
                                    class="form-label @error('sexo') is-invalid @enderror fw-bold">Sexo</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input sexo" type="radio" name="sexo" id="masculino"
                                        value="0" {{ old('sexo', $paciente->sexo) == '0' ? 'checked' : '' }} required>
                                    <label class="form-check-label" for="masculino">Masculino</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input sexo" type="radio" name="sexo" id="femenino"
                                        value="1" {{ old('sexo', $paciente->sexo) == '1' ? 'checked' : '' }} required>
                                    <label class="form-check-label" for="femenino">Femenino</label>
                                </div>
                                @error('sexo')
                                    <p class="bg-danger text-white my-2 rounded-lg text-sm p-2 text-center">
                                        {{ $message }}</p>
                                @enderror
                            </div>

                            <!--Dirección-->
                            <div class="col-md-12">
                                <label for="direccion"
                                    class="form-label @error('direccion') is-invalid @enderror fw-bold">Dirección</label>
                                <textarea class="form-control" id="direccion" name="direccion" placeholder="Escriba la dirección" required>{{ old('direccion', $paciente->direccion) }}</textarea>
                                @error('direccion')
                                    <p class="bg-danger text-white my-2 rounded-lg text-sm p-2 text-center">
                                        {{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <div class="row d-flex justify-content-between mb-3 mt-1">
                            <!--Teléfono-->
                            <div class="col-md-6 mb-2">
                                <label for="telefono"
                                    class="form-label @error('telefono') is-invalid @enderror fw-bold">Teléfono</label>
                                <input type="number" class="form-control" id="telefono" name="telefono"
                                    placeholder="00000000" value="{{ old('telefono', $paciente->telefono) }}" required>
                                @error('telefono')
                                    <p class="bg-danger text-white my-2 rounded-lg text-sm p-2 text-center">
                                        {{ $message }}</p>
                                @enderror
                            </div>

                            <!--Número de Referencia-->
                            <div class="col-md-6 mb-2">
                                <label for="telefono_referencia"
                                    class="form-label @error('telefono_referencia') is-invalid @enderror fw-bold">Num.
                                    Referencia</label>
                                <input type="number" class="form-control" id="telefono_referencia"
                                    name="telefono_referencia" value="{{ old('telefono_referencia', $paciente->telefono_referencia) }}"
                                    placeholder="00000000" required>
                                @error('telefono_referencia')
                                    <p class="bg-danger text-white my-2 rounded-lg text-sm p-2 text-center">
                                        {{ $message }}</p>
                                @enderror
                            </div>

                            <!--Estado Civil-->
                            <div class="col-md-6 mb-2">
                                <label for="estado_civil"
                                    class="form-label @error('estado_civil') is-invalid @enderror fw-bold">Estado
                                    Civil</label>
                                <select class="form-select" id="estado_civil" name="estado_civil" required>
                                    <option selected disabled value="">-- Seleccione --</option>
                                    <option value="casado" {{ old('estado_civil', $paciente->estado_civil) == 'casado' ? 'selected' : '' }}>
                                        Casado</option>
                                    <option value="viudo" {{ old('estado_civil', $paciente->estado_civil) == 'viudo' ? 'selected' : '' }}>
                                        Viudo</option>
                                    <option value="divorciado" {{ old('estado_civil', $paciente->estado_civil) == 'divorciado' ? 'selected' : '' }}>
                                        Divorciado</option>
                                    <option value="separado" {{ old('estado_civil', $paciente->estado_civil) == 'separado' ? 'selected' : '' }}>
                                        Separado</option>
                                    <option value="soltero" {{ old('estado_civil', $paciente->estado_civil) == 'soltero' ? 'selected' : '' }}>
                                        Soltero</option>
                                    <option value="union libre" {{ old('estado_civil', $paciente->estado_civil) == 'union libre' ? 'selected' : '' }}>
                                        Unión Libre
                                    </option>
                                </select>
                                @error('estado_civil')
                                    <p class="bg-danger text-white my-2 rounded-lg text-sm p-2 text-center">
                                        {{ $message }}</p>
                                @enderror
                            </div>

                            <!--Años-->
                            <div class="col-md-6 mb-2">
                                <label for="anios"
                                    class="form-label @error('anios') is-invalid @enderror fw-bold">Años</label>
                                <input type="number" class="form-control" id="anios" name="anios"
                                    value="{{ old('anios', $paciente->anios) }}" min="0" placeholder="Años del estado civil" required>
                                @error('anios')
                                    <p class="bg-danger text-white my-2 rounded-lg text-sm p-2 text-center">
                                        {{ $message }}</p>
                                @enderror
                            </div>

                            <!--Nombres completo del Esposo-->
                            <div class="col-md-12 mb-2">
                                <label for="nombre_esposo"
                                    class="form-label @error('nombre_esposo') is-invalid @enderror fw-bold">Nombres
                                    completo del Esposo(a)</label>
                                <input type="text" class="form-control" id="nombre_esposo" name="nombre_esposo"
                                    value="{{ old('nombre_esposo', $paciente->nombre_esposo) }}" placeholder="Nombre Completo" required>
                                @error('nombre_esposo')
                                    <p class="bg-danger text-white my-2 rounded-lg text-sm p-2 text-center">
                                        {{ $message }}</p>
                                @enderror
                            </div>

                            <!--Edad del Esposo-->
                            <div class="col-md-5 mb-2">
                                <label for="edad_esposo"
                                    class="form-label @error('edad_esposo') is-invalid @enderror fw-bold">Edad
                                    Esposo(a)</label>
                                <input type="number" class="form-control" id="edad_esposo" name="edad_esposo"
                                    min="0" value="{{ old('edad_esposo', $paciente->edad_esposo) }}" placeholder="Edad esposo" required>
                                @error('edad_esposo')
                                    <p class="bg-danger text-white my-2 rounded-lg text-sm p-2 text-center">
                                        {{ $message }}</p>
                                @enderror
                            </div>

                            <!--Grado de Instrucción-->
                            <div class="col-md-7 mb-2">
                                <label for="grado_instruccion"
                                    class="form-label @error('grado_instruccion') is-invalid @enderror fw-bold">Grado
                                    de Instrucción</label>
                                <select class="form-select" id="grado_instruccion" name="grado_instruccion" required>
                                    <option selected disabled value="">-- Seleccione --</option>
                                    <option value="primaria" {{ old('grado_instruccion', $paciente->grado_instruccion) == 'primaria' ? 'selected' : '' }}>
                                        primaria
                                    </option>
                                    <option value="secundaria"
                                        {{ old('grado_instruccion', $paciente->grado_instruccion) == 'secundaria' ? 'selected' : '' }}>Secundaria
                                    </option>
                                    <option value="bachiller" {{ old('grado_instruccion', $paciente->grado_instruccion) == 'bachiller' ? 'selected' : '' }}>
                                        Bachiller
                                    </option>
                                    <option value="profesional"
                                        {{ old('grado_instruccion', $paciente->grado_instruccion) == 'profesional' ? 'selected' : '' }}>Profesional
                                    </option>
                                </select>
                                @error('grado_instruccion')
                                    <p class="bg-danger text-white my-2 rounded-lg text-sm p-2 text-center">
                                        {{ $message }}</p>
                                @enderror
                            </div>

                            <!--Cantidad de Hijos-->
                            <div class="col-md-12 mb-2">
                                <label for="cantidad_hijos"
                                    class="form-label @error('cantidad_hijos') is-invalid @enderror fw-bold">Cantidad
                                    de Hijos</label>
                                <input type="number" class="form-control" id="cantidad_hijos" name="cantidad_hijos"
                                    value="{{ old('cantidad_hijos', $paciente->cantidad_hijos) }}" min="0"
                                    placeholder="Introduzca la cantidad de Hijos que tiene" required>
                                @error('cantidad_hijos')
                                    <p class="bg-danger text-white my-2 rounded-lg text-sm p-2 text-center">
                                        {{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <div class="row d-flex justify-content-between mb-3">
                            <!--Ocupación-->
                            <div class="col-md-12 mb-2">
                                <label for="ocupacion"
                                    class="form-label @error('ocupacion') is-invalid @enderror fw-bold">Ocupación</label>
                                <input type="text" class="form-control" id="ocupacion" name="ocupacion"
                                    value="{{ old('ocupacion', $paciente->ocupacion) }}" placeholder="Escriba la ocupación" required>
                                @error('ocupacion')
                                    <p class="bg-danger text-white my-2 rounded-lg text-sm p-2 text-center">
                                        {{ $message }}</p>
                                @enderror
                            </div>

                            <!--Ingreso Mensual-->
                            <div class="col-md-7 mb-2">
                                <label class="form-label @error('ingreso_mensual') is-invalid @enderror fw-bold"
                                    for="ingreso_mensual">Ingreso Mensual</label>
                                <div class="input-group">
                                    <div class="input-group-text">Bs.</div>
                                    <input type="number" class="form-control" id="ingreso_mensual"
                                        placeholder="Digite en Bs." name="ingreso_mensual"
                                        value="{{ old('ingreso_mensual', $paciente->ingreso_mensual) }}" min="0" required>
                                    @error('ingreso_mensual')
                                        <p class="bg-danger text-white my-2 rounded-lg text-sm p-2 text-center">
                                            {{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <!--Motivo de Consulta-->
                            <div class="col-md-12">
                                <label for="motivo_consulta"
                                    class="form-label @error('motivo_consulta') is-invalid @enderror fw-bold">Motivo
                                    de Consulta</label>
                                <textarea class="form-control" id="motivo_consulta" name="motivo_consulta"
                                    placeholder="Describa el motivo de la consulta" rows="7" required>{{ old('motivo_consulta', $paciente->motivo_consulta) }}</textarea>
                                @error('motivo_consulta')
                                    <p class="bg-danger text-white my-2 rounded-lg text-sm p-2 text-center">
                                        {{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--END Card group-->

            <!--START Car Group 2-->
            <div class="card-group mb-3">
                <div class="card shadow-sm border-0">
                    <div class="card-header text-center text-white fw-bold h4" style="background-color: #85c2d4">Entrevista Inicial</div>
                    {{-- <div class="card-header">Entrevista Incial</div> --}}
                    <div class="card-body">
                        <!--Entrevista Inicial-->
                        {{-- <legend>Entrevista Inicial</legend> --}}
                        <div class="row d-flex justify-content-between mb-2">
                            <!--Historia Familiar-->
                            <div class="col-md-12 mb-3">
                                <label for="historia_familiar"
                                    class="form-label @error('historia_familiar') is-invalid @enderror fw-bold">Historia
                                    Familiar</label>
                                <textarea class="form-control" id="historia_familiar" name="historia_familiar"
                                    placeholder="Describa la historia familiar del paciente" rows="5" required>{{ old('historia_familiar', $paciente->historia_familiar) }}</textarea>
                                @error('historia_familiar')
                                    <p class="bg-danger text-white my-2 rounded-lg text-sm p-2 text-center">
                                        {{ $message }}</p>
                                @enderror
                            </div>

                            <!--Tipo de Familia-->
                            <div class="col-md-6 mb-2">
                                <label for="tipo_familia"
                                    class="form-label @error('tipo_familia') is-invalid @enderror fw-bold">Tipo de
                                    Familia</label>
                                <select class="form-select" id="tipo_familia" name="tipo_familia" required>
                                    <option selected disabled value="">-- Seleccione --</option>
                                    <option value="monoparental"
                                        {{ old('tipo_familia', $paciente->tipo_familia) == 'Monoparental' ? 'selected' : '' }}>Monoparental
                                    </option>
                                    <option value="nuclear" {{ old('tipo_familia', $paciente->tipo_familia) == 'nuclear' ? 'selected' : '' }}>
                                        Nuclear</option>
                                    <option value="extensa" {{ old('tipo_familia', $paciente->tipo_familia) == 'extensa' ? 'selected' : '' }}>
                                        Extensa</option>
                                    <option value="ampliada" {{ old('tipo_familia', $paciente->tipo_familia) == 'ampliada' ? 'selected' : '' }}>
                                        Ampliada</option>
                                    <option value="reconstituida"
                                        {{ old('tipo_familia', $paciente->tipo_familia) == 'reconstituida' ? 'selected' : '' }}>Reconstituida
                                    </option>
                                </select>
                                @error('tipo_familia')
                                    <p class="bg-danger text-white my-2 rounded-lg text-sm p-2 text-center">
                                        {{ $message }}</p>
                                @enderror
                            </div>

                            <!--Tipo-->
                            <div class="col-md-6 mb-2">
                                <label for="sexo"
                                    class="form-label @error('tipo') is-invalid @enderror fw-bold">Tipo</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="tipo" id="funcional"
                                        value="funcional" {{ old('tipo', $paciente->tipo) == 'funcional' ? 'checked' : '' }} required>
                                    <label class="form-check-label" for="funcional">Funcional</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="tipo" id="disfuncional"
                                        value="disfuncional" {{ old('tipo', $paciente->tipo) == 'disfuncional' ? 'checked' : '' }} required>
                                    <label class="form-check-label" for="disfuncional">Disfuncional</label>
                                </div>
                                @error('tipo')
                                    <p class="bg-danger text-white my-2 rounded-lg text-sm p-2 text-center">
                                        {{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <!--Relación con los Familiares-->
                <div class="card shadow-sm border-0">
                    <div class="card-header text-center text-white fw-bold h4" style="background-color: #85c2d4">Relación con los Familiares
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-between">
                            <div class="col-md-6 mb-2">
                                <div class="card">
                                    <div class="card-header text-center fst-italic text-muted" style="background-color: #eaeace">
                                        <span class="h6 @error('conyugal') is-invalid @enderror">Relación
                                            Conyugal</span>
                                    </div>
                                    <div class="card-body card-conyugal">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="conyugal" id="estables"
                                                value="estables" {{ old('conyugal', $paciente->conyugal) == 'estables' ? 'checked' : '' }}
                                                required
                                            >
                                            <label class="form-check-label" for="estables">Estables</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="conyugal" id="estrecho"
                                                value="estrecho" {{ old('conyugal', $paciente->conyugal) == 'estrecho' ? 'checked' : '' }}
                                            >
                                            <label class="form-check-label" for="estrecho">Estrecho</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="conyugal" id="distante"
                                                value="distante" {{ old('conyugal', $paciente->conyugal) == 'distante' ? 'checked' : '' }}
                                            >
                                            <label class="form-check-label" for="distante">Distante</label>
                                        </div>
                                        <div class="form-check form-check-inline m-0">
                                            <input class="form-check-input" type="checkbox" name="conyugal" id="conflictivo"
                                                value="conflictivo" {{ old('conyugal', $paciente->conyugal) == 'conflictivo' ? 'checked' : '' }}
                                            >
                                            <label class="form-check-label" for="conflictivo">Conflictivo</label>
                                        </div>
                                        <div>
                                            <input
                                                type="text"
                                                class="form-control"
                                                id="otros-conyugal"
                                                name="conyugal"
                                                value="{{ old('conyugal', $paciente->conyugal) }}"
                                                placeholder="Otros..."
                                            >
                                        </div>

                                        @error('conyugal')
                                            <p class="bg-danger text-white my-2 rounded-lg text-sm p-2 text-center">
                                                {{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-2">
                                <div class="card">
                                    <div class="card-header text-center fst-italic text-muted" style="background-color: #eaeace">
                                        <span class="h6 @error('materno') is-invalid @enderror">Relación
                                            Materno-Filial</span>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="materno"
                                                id="estables-materno" value="estables"
                                                {{ old('materno', $paciente->materno) == 'estables' ? 'checked' : '' }} required>
                                            <label class="form-check-label" for="estables-materno">Estables</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="materno"
                                                id="estrecho-materno" value="estrecho"
                                                {{ old('materno', $paciente->materno) == 'estrecho' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="estrecho-materno">Estrecho</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="materno"
                                                id="distante-materno" value="distante"
                                                {{ old('materno', $paciente->materno) == 'distante' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="distante-materno">Distante</label>
                                        </div>
                                        <div class="form-check form-check-inline m-0">
                                            <input class="form-check-input" type="checkbox" name="materno"
                                                id="conflictivo-materno" value="conflictivo"
                                                {{ old('materno', $paciente->materno) == 'conflictivo' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="conflictivo-materno">Conflictivo</label>
                                        </div>
                                        <div>
                                            <input type="text" class="form-control" id="otros-materno" name="materno"
                                                value="{{ old('materno', $paciente->materno) }}" placeholder="Otros...">
                                        </div>

                                        @error('materno')
                                            <p class="bg-danger text-white my-2 rounded-lg text-sm p-2 text-center">
                                                {{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-2">
                                <div class="card">
                                    <div class="card-header text-center fst-italic text-muted" style="background-color: #eaeace">
                                        <span class="h6 @error('paterno') is-invalid @enderror">Relación
                                            Paterno-Filial</span>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="paterno"
                                                id="estables-paterno" value="estables"
                                                {{ old('paterno', $paciente->paterno) == 'estables' ? 'checked' : '' }} required>
                                            <label class="form-check-label" for="estables-paterno">Estables</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="paterno"
                                                id="estrecho-paterno" value="estrecho"
                                                {{ old('paterno', $paciente->paterno) == 'estrecho' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="estrecho-paterno">Estrecho</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="paterno"
                                                id="distante-paterno" value="distante"
                                                {{ old('paterno', $paciente->paterno) == 'distante' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="distante-paterno">Distante</label>
                                        </div>
                                        <div class="form-check form-check-inline m-0">
                                            <input class="form-check-input" type="checkbox" name="paterno"
                                                id="conflictivo-paterno" value="conflictivo"
                                                {{ old('paterno', $paciente->paterno) == 'conflictivo' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="conflictivo-paterno">Conflictivo</label>
                                        </div>
                                        <div>
                                            <input type="text" class="form-control" id="otros-paterno" name="paterno"
                                                value="{{ old('paterno', $paciente->paterno) }}" placeholder="Otros...">
                                        </div>

                                        @error('paterno')
                                            <p class="bg-danger text-white my-2 rounded-lg text-sm p-2 text-center">
                                                {{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-2">
                                <div class="card">
                                    <div class="card-header text-center fst-italic text-muted" style="background-color: #eaeace">
                                        <span class="h6 @error('fraterno') is-invalid @enderror">Relación
                                            Fraterno-Filial</span>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="fraterno"
                                                id="estables-fraterno" value="estables"
                                                {{ old('fraterno', $paciente->fraterno) == 'estables' ? 'checked' : '' }} required>
                                            <label class="form-check-label" for="estables-fraterno">Estables</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="fraterno"
                                                id="estrecho-fraterno" value="estrecho"
                                                {{ old('fraterno', $paciente->fraterno) == 'estrecho' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="estrecho-fraterno">Estrecho</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="fraterno"
                                                id="distante-fraterno" value="distante"
                                                {{ old('fraterno', $paciente->fraterno) == 'distante' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="distante-fraterno">Distante</label>
                                        </div>
                                        <div class="form-check form-check-inline m-0">
                                            <input class="form-check-input" type="checkbox" name="fraterno"
                                                id="conflictivo-fraterno" value="conflictivo"
                                                {{ old('fraterno', $paciente->fraterno) == 'conflictivo' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="conflictivo-fraterno">Conflictivo</label>
                                        </div>
                                        <div>
                                            <input type="text" class="form-control" id="otros-fraterno" name="fraterno"
                                                value="{{ old('fraterno', $paciente->fraterno) }}" placeholder="Otros...">
                                        </div>

                                        @error('fraterno')
                                            <p class="bg-danger text-white my-2 rounded-lg text-sm p-2 text-center">
                                                {{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--END Card group-->

            <!--START Car Group 3-->
            <div class="card-group mb-3">
                <div class="card shadow-sm border-0">
                    <div class="card-header text-center text-white fw-bold h4" style="background-color: #85c2d4">Conclusiones</div>
                    <div class="card-body">
                        <div class="row d-flex justify-content-between mb-3">
                            <div class="col-md-6 my-2">
                                <label for="diagnostico_social"
                                    class="form-label @error('diagnostico_social') is-invalid @enderror fw-bold">Diagnóstico
                                    Social:</label>
                                <textarea id="diagnostico_social" name="diagnostico_social" class="form-control"
                                    placeholder="Describa el diagnóstico social..." style="height: 120px" required>{{ old('diagnostico_social', $paciente->diagnostico_social) }}</textarea>
                                @error('diagnostico_social')
                                    <p class="bg-danger text-white my-2 rounded-lg text-sm p-2 text-center">
                                        {{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6 my-2">
                                <label for="acciones"
                                    class="form-label @error('acciones') is-invalid @enderror fw-bold">Acciones a
                                    Seguir:</label>
                                <textarea id="acciones" name="acciones" class="form-control"
                                    placeholder="Describa todas las acciones vea conveniente" style="height: 120px" required>{{ old('acciones', $paciente->acciones) }}</textarea>
                                @error('acciones')
                                    <p class="bg-danger text-white my-2 rounded-lg text-sm p-2 text-center">
                                        {{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex align-items-center justify-content-center justify-content-md-end bg-transparent my-3 px-3">
                <a href="{{ route('home') }}" class="btn btn-danger fw-bold mx-2"><i class="fa-solid fa-circle-xmark"></i> Cancelar</a>
                <button class="btn btn-success fw-bold" type="submit" id="submit"><i class="fa-solid fa-circle-check"></i> Actualizar</button>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>

    <!-- JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/js/toastr.js"></script>

    <script>
        if ($("#formPacientes").length > 0) {
            $("#formPacientes").validate({

                rules: {
                    caso: {
                        required: true,
                        maxlength: 5,
                        /*remote: {
                            url: "{{ route('paciente.validar.caso') }}",
                            type: "GET",
                            data: {
                                caso: function() {
                                    return $("input[name='caso']").val();
                                }
                            },
                            dataFilter: function(data) {
                                var json = JSON.parse(data);
                                if (json.msg == "true") {
                                    return "\"" + "El número de caso ya existe, digite otro por favor." + "\"";
                                } else {
                                    return 'true';
                                }
                            }
                        }*/
                    },
                    fecha: {
                        required: true
                    },
                    hora: {
                        required: true
                    },
                    nombres: {
                        required: true,
                        maxlength: 70
                    },
                    edad: {
                        required: true,
                        maxlength: 2
                    },
                    sexo: {
                        required: true
                    },
                    direccion: {
                        required: true,
                        maxlength: 250
                    },
                    telefono: {
                        required: true,
                        maxlength: 8,
                        minlength: 8
                    },
                    telefono_referencia: {
                        required: true,
                        maxlength: 8,
                        minlength: 8
                    },
                    estado_civil: {
                        required: true
                    },
                    anios: {
                        required: true,
                        maxlength: 3
                    },
                    nombre_esposo: {
                        required: true,
                        maxlength: 70
                    },
                    edad_esposo: {
                        required: true,
                        maxlength: 2
                    },
                    grado_instruccion: {
                        required: true
                    },
                    cantidad_hijos: {
                        required: true,
                        maxlength: 2
                    },
                    ocupacion: {
                        required: true,
                        maxlength: 30
                    },
                    ingreso_mensual: {
                        required: true,
                        maxlength: 6
                    },
                    motivo_consulta: {
                        required: true,
                        maxlength: 400
                    },
                    historia_familiar: {
                        required: true,
                        maxlength: 500
                    },
                    tipo_familia: {
                        required: true
                    },
                    tipo: {
                        required: true
                    },
                    conyugal: {
                        required: false
                    },
                    materno: {
                        required: false
                    },
                    paterno: {
                        required: false
                    },
                    fraterno: {
                        required: false
                    },
                    diagnostico_social: {
                        required: true,
                        maxlength: 500
                    },
                    acciones: {
                        required: true,
                        maxlength: 500
                    },
                },

                messages: {
                    caso: {
                        required: "Por favor introduzca el número de caso.",
                        maxlength: "El caso no debe superar los 5 dígitos.",
                        //remote: "El número de caso ya existe."
                    },
                    fecha: {
                        required: "Por favor indique la fecha.",
                    },
                    hora: {
                        required: "Por favor indique la hora.",
                    },
                    nombres: {
                        required: "Por favor escriba el nombre completo.",
                        maxlength: "El nombre no debe superar los 70 caracteres",
                    },
                    edad: {
                        required: "Por favor digite la edad.",
                        maxlength: "La edad no debe pasar los 2 dígitos.",
                    },
                    sexo: {
                        required: "Por favor seleccione una opción.",
                    },
                    direccion: {
                        required: "Por favor escriba la dirección.",
                        maxlength: "Trate que no sobrepase los 250 caracteres",
                    },
                    telefono: {
                        required: "Por favor digite el teléfono",
                        minlength: "El teléfono debe tener al menos 8 dígitos",
                        maxlength: "El teléfono no debe pasar los 8 dígitos.",
                    },
                    telefono_referencia: {
                        required: "Por favor digite el número de referencia",
                        minlength: "El teléfono debe tener al menos 8 dígitos",
                        maxlength: "El número de referencia no debe pasar los 8 dígitos.",
                    },
                    estado_civil: {
                        required: "Por favor seleccione una opción.",
                    },
                    anios: {
                        required: "Por favor indique los años.",
                        maxlength: "La edad no debe pasar los 2 dígitos.",
                    },
                    nombre_esposo: {
                        required: "Por favor escriba el nombre completo",
                        maxlength: "El nombre no debe superar los 70 caracteres",
                    },
                    edad_esposo: {
                        required: "Por favor digite la edad del esposo(a).",
                        maxlength: "La edad no debe pasar los 2 dígitos.",
                    },
                    grado_instruccion: {
                        required: "Por favor seleccione una opción.",
                    },
                    cantidad_hijos: {
                        required: "Por favor digite la cantidad de hijos.",
                        maxlength: "La cantidad no debe pasar los 2 dígitos.",
                    },
                    ocupacion: {
                        required: "Por favor escriba la ocupación.",
                        maxlength: "Trate que no sobrepase los 30 caracteres",
                    },
                    ingreso_mensual: {
                        required: "Por favor digite el ingreso mensual en números.",
                        maxlength: "El monto no debe superar los 6 dígitos.",
                    },
                    motivo_consulta: {
                        required: "Por favor describa el motivo de la consulta.",
                        maxlength: "La descripción no debe superar los 400 caracteres",
                    },
                    historia_familiar: {
                        required: "Por favor describa la historia familiar.",
                        maxlength: "La descripción no debe superar los 550 caracteres",
                    },
                    tipo_familia: {
                        required: "Por favor seleccione una opción.",
                    },
                    tipo: {
                        required: "Por favor seleccione una opción.",
                    },
                    conyugal: {
                        required: "Por favor seleccione una opción.",
                    },
                    materno: {
                        required: "Por favor seleccione una opción.",
                    },
                    paterno: {
                        required: "Por favor seleccione una opción.",
                    },
                    fraterno: {
                        required: "Por favor seleccione una opción.",
                    },
                    diagnostico_social: {
                        required: "Por favor describa el diagnóstico social.",
                        maxlength: "La descripción no debe superar los 500 caracteres",
                    },
                    acciones: {
                        required: "Por favor describa las acciones a tomar.",
                        maxlength: "La descripción no debe superar los 500 caracteres",
                    },
                },
            })
        }
    </script>
@endpush
