@extends('layouts.dashboard')

@section('titulo')
    Nuevo Caso
@endsection

@push('styles')
    <!-- CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/css/toastr.css" rel="stylesheet" />

    <style>
        .error{
        color: #FF0000; 
        }
    </style>
@endpush

@section('content')
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Crear</li>
    </ol>
    {{-- <form class="needs-validation" action="{{ route('paciente.store') }}" method="POST" novalidate> --}}
    <form action="{{ route('paciente.update',$paciente->id) }}" method="POST" >
        @method('patch')
        @csrf
        {{-- <div class="alert alert-danger print-error-msg" style="display:none">
            <ul></ul>
        </div> --}}
        <!--Card group-->
        <div class="card-group mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="row d-flex justify-content-between mb-3">
                        <!--N° Caso-->
                        <div class="col-md-12 mb-2">
                            <label class="visually-hidden" for="caso">Caso</label>
                            <div class="input-group">
                                <div class="input-group-text">N° Caso</div>
                                <input
                                    type="number"
                                    class="form-control"
                                    id="caso"
                                    placeholder="Número de caso"
                                    name="caso"
                                    min="0"
                                    required
                                    value="{{ $paciente->caso }}"
                                />
                            </div>
                        </div>

                        <!--Fecha-->
                        <div class="col-md-7 mb-2">
                            <label class="form-label" for="fecha">Fecha</label>
                            <div class="input-group">
                                {{-- <div class="input-group-text">Fecha</div> --}}
                                <input
                                    type="date"
                                    class="form-control"
                                    id="fecha"
                                    name="fecha"
                                    required
                                    value="{{ $paciente->fecha }}"
                                >
                                {{--  <div class="invalid-feedback">
                                    Establezca una fecha
                                </div>  --}}
                            </div>
                        </div>

                        <!--Hora-->
                        <div class="col-md-5 mb-2">
                            <label class="form-label" for="hora">Hora</label>
                            <div class="input-group">
                                {{-- <div class="input-group-text">Hora</div> --}}
                                <input type="time" class="form-control" id="hora" name="hora" required value="{{ $paciente->hora }}">
                                {{--  <div class="invalid-feedback">
                                    Establezca una hora
                                </div>  --}}
                            </div>
                        </div>
                        <hr>
                    </div>

                    <div class="row d-flex justify-content-between mb-3">
                        <!--Nombre Completo-->
                        <div class="col-md-12 mb-2">
                            <label for="nombres" class="form-label fw-bold">Nombres y Apellidos</label>
                            <input type="text" class="form-control" id="nombres" name="nombres"
                                placeholder="Nombre Completo" value="{{ $paciente->nombres }}" required>
                            {{--  <div class="invalid-feedback">
                                Nombre Completo Obligatorio
                            </div>  --}}
                        </div>

                        <!--Edad-->
                        <div class="col-md-4 mb-2">
                            <label for="edad" class="form-label fw-bold">Edad</label>
                            <input type="number" class="form-control" id="edad" name="edad" min="0"
                                placeholder="Edad" value="{{ $paciente->edad }}" required>
                            {{--  <div class="invalid-feedback">
                                Introduzca la edad
                            </div>  --}}
                        </div>

                        <!--Sexo-->
                        <div class="col-md-8 mb-2 p-md-0">
                            <label for="sexo" class="form-label fw-bold">Sexo</label><br>
                            <div class="form-check form-check-inline">
                                <input
                                    class="form-check-input sexo"
                                    type="radio"
                                    name="sexo"
                                    id="masculino"
                                    value="1"
                                    {{ $paciente->sexo == '0' ? 'checked' : '' }}
                                    required
                                >
                                <label class="form-check-label" for="masculino">Masculino</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input
                                    class="form-check-input sexo"
                                    type="radio"
                                    name="sexo"
                                    id="femenino"
                                    value="0"
                                    {{ $paciente->sexo == '1' ? 'checked' : '' }}
                                >
                                <label class="form-check-label" for="femenino">Femenino</label>
                            </div>
                        </div>

                        <!--Dirección-->
                        <div class="col-md-12 mb-2">
                            <label for="direccion" class="form-label fw-bold">Dirección</label>
                            <textarea class="form-control" id="direccion" name="direccion" placeholder="Escriba la dirección" required>{{ $paciente->direccion}}</textarea>
                            {{--  <div class="invalid-feedback">
                                Introduzca la dirección
                            </div>  --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row d-flex justify-content-between mb-3">
                        <!--Teléfono-->
                        <div class="col-md-6 mb-2">
                            <label for="telefono" class="form-label">Teléfono</label>
                            <input type="number" class="form-control" id="telefono" name="telefono" placeholder="00000000" value="{{ $paciente->telefono }}" required>
                            {{--  <div class="invalid-feedback">
                                Introduzca el teléfono
                            </div>  --}}
                        </div>

                        <!--Número de Referencia-->
                        <div class="col-md-6 mb-2">
                            <label for="telefono_referencia" class="form-label">Num. Referencia</label>
                            <input type="number" class="form-control" id="telefono_referencia"
                                name="telefono_referencia" placeholder="00000000" value="{{ $paciente->telefono_referencia }}" required>
                            {{--  <div class="invalid-feedback">
                                Introduzca el número de referencia
                            </div>  --}}
                        </div>

                        <!--Estado Civil-->
                        <div class="col-md-6 mb-2">
                            <label for="estado_civil" class="form-label">Estado Civil</label>
                            <select class="form-select" id="estado_civil" name="estado_civil" required>
                                <option selected disabled value="">-- Seleccione --</option>
                                <option value="casado" {{ $paciente->estado_civil == 'casado' ? 'selected' : '' }}>Casado</option>
                                <option value="Viudo" {{ $paciente->estado_civil == 'Viudo' ? 'selected' : '' }}>Viudo</option>
                                <option value="Divorciado" {{ $paciente->estado_civil == 'Divorciado' ? 'selected' : '' }}>Divorciado</option>
                                <option value="Separado" {{ $paciente->estado_civil == 'Separado' ? 'selected' : '' }}>Separado</option>
                                <option value="Soltero" {{ $paciente->estado_civil == 'Soltero' ? 'selected' : '' }}>Soltero</option>
                                <option value="Union Libre" {{ $paciente->estado_civil == 'Union Libre' ? 'selected' : '' }}>Union Libre</option>
                            </select>
                            {{--  <div class="invalid-feedback">
                                Escoga una opción, por favor.
                            </div>  --}}
                        </div>

                        <!--Años-->
                        <div class="col-md-6 mb-2">
                            <label for="anios" class="form-label">Años</label>
                            <input type="number" class="form-control" id="anios" name="anios" min="0"
                                placeholder="Años del estado civil" value="{{ $paciente->anios }}" required>
                            {{--  <div class="invalid-feedback">
                                Introduzca los años del estado civil
                            </div>  --}}
                        </div>

                        <!--Nombres completo del Esposo-->
                        <div class="col-md-12 mb-2">
                            <label for="nombre_esposo" class="form-label">Nombres completo del Esposo(a)</label>
                            <input type="text" class="form-control" id="nombre_esposo" name="nombre_esposo"
                                placeholder="Nombre Completo" value="{{ $paciente->nombre_esposo }}" required>
                            {{--  <div class="invalid-feedback">
                                Nombre del Esposo Obligatorio
                            </div>  --}}
                        </div>

                        <!--Edad del Esposo-->
                        <div class="col-md-5 mb-2">
                            <label for="edad_esposo" class="form-label">Edad Esposo(a)</label>
                            <input type="number" class="form-control" id="edad_esposo" name="edad_esposo"
                                min="0" placeholder="Edad esposo" value="{{ $paciente->edad_esposo }}" required>
                            {{--  <div class="invalid-feedback">
                                Introduzca la edad del esposo
                            </div>  --}}
                        </div>

                        <!--Grado de Instrucción-->
                        <div class="col-md-7 mb-2">
                            <label for="grado_instruccion" class="form-label">Grado de Instrucción</label>
                            <select class="form-select" id="grado_instruccion" name="grado_instruccion" required>
                                <option selected disabled value="">-- Seleccione --</option>
                                <option value="Primaria" {{ $paciente->grado_instruccion == 'Primaria' ? 'selected' : '' }}>Primaria</option>
                                <option value="Secundaria" {{ $paciente->grado_instruccion == 'Secundaria' ? 'selected' : '' }}>Secundaria</option>
                                <option value="Bachiller" {{ $paciente->grado_instruccion == 'Bachiller' ? 'selected' : '' }}>Bachiller</option>
                                <option value="Profesional" {{ $paciente->grado_instruccion == 'Profesional' ? 'selected' : '' }}>Profesional</option>
                            </select>
                            {{--  <div class="invalid-feedback">
                                Escoga una grado, por favor.
                            </div>  --}}
                        </div>

                        <!--Cantidad de Hijos-->
                        <div class="col-md-12 mb-2">
                            <label for="cantidad_hijos" class="form-label">Cantidad de Hijos</label>
                            <input type="number" class="form-control" id="cantidad_hijos" name="cantidad_hijos"
                                min="0" placeholder="Introduzca la cantidad de Hijos que tiene" value="{{ $paciente->cantidad_hijos }}" required>
                            {{--  <div class="invalid-feedback">
                                Introduzca la cantidad de Hijos
                            </div>  --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row d-flex justify-content-between mb-3">
                        <!--Ocupación-->
                        <div class="col-md-12 mb-2">
                            <label for="ocupacion" class="form-label">Ocupación</label>
                            <input type="text" class="form-control" id="ocupacion" name="ocupacion"
                                placeholder="Escriba la ocupación" value="{{ $paciente->ocupacion }}" required>
                            {{--  <div class="invalid-feedback">
                                Escriba la ocupación, por favor.
                            </div>  --}}
                        </div>

                        <!--Ingreso Mensual-->
                        <div class="col-md-7 mb-2">
                            <label class="form-label" for="ingreso_mensual">Ingreso Mensual</label>
                            <div class="input-group">
                                <div class="input-group-text">Bs.</div>
                                <input type="number" class="form-control" id="ingreso_mensual"
                                    placeholder="Digite en Bs." name="ingreso_mensual" min="0" value="{{ $paciente->ingreso_mensual }}" required>
                                {{--  <div class="invalid-feedback">
                                    El Ingreso Mensual es obligatorio
                                </div>  --}}
                            </div>
                        </div>

                        <!--Motivo de Consulta-->
                        <div class="col-md-12">
                            <label for="motivo_consulta" class="form-label">Motivo de Consulta</label>
                            <textarea class="form-control" id="motivo_consulta" name="motivo_consulta"
                                placeholder="Describa el motivo de la consulta" rows="7" required>{{ $paciente->motivo_consulta }}</textarea>
                            {{--  <div class="invalid-feedback">
                                Describa el motivo, por favor.
                            </div>  --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--END Card group-->

        <!--START Car Group 3-->
        <div class="card-group mb-3">
            <div class="card">
                {{-- <div class="card-header">Entrevista Incial</div> --}}
                <div class="card-body">
                    <!--Entrevista Inicial-->
                    <fieldset>
                        <legend>Entrevista Inicial</legend>
                        <div class="row d-flex justify-content-between mb-3">
                            <!--Historia Familiar-->
                            <div class="col-md-12 mb-3">
                                <label for="historia_familiar" class="form-label">Historia Familiar</label>
                                <textarea
                                    class="form-control"
                                    id="historia_familiar"
                                    name="historia_familiar"
                                    placeholder="Describa la historia familiar del paciente"
                                    rows="5"
                                    required
                                >{{ $paciente->historia_familiar }}</textarea>
                                {{--  <div class="invalid-feedback">
                                    Describa la historia familiar, por favor.
                                </div>  --}}
                            </div>

                            <!--Tipo de Familia-->
                            <div class="col-md-6 mb-2">
                                <label for="tipo_familia" class="form-label">Tipo de Familia</label>
                                <select class="form-select" id="tipo_familia" name="tipo_familia" required>
                                    <option selected disabled value="">-- Seleccione --</option>
                                    <option value="Monoparental" {{ $paciente->tipo_familia == 'monoparental' ? 'selected' : '' }}>Monoparental</option>
                                    <option value="Nuclear" {{ $paciente->tipo_familia == 'nuclear' ? 'selected' : '' }}>Nuclear</option>
                                    <option value="Extensa" {{ $paciente->tipo_familia == 'extensa' ? 'selected' : '' }}>Extensa</option>
                                    <option value="Ampliada" {{ $paciente->tipo_familia == 'ampliada' ? 'selected' : '' }}>Ampliada</option>
                                    <option value="Reconstituida" {{ $paciente->tipo_familia == 'reconstituida' ? 'selected' : '' }}>Reconstituida</option>
                                </select>
                                {{--  <div class="invalid-feedback">
                                    Elija el tipo de familia, por favor.
                                </div>  --}}
                            </div>

                            <!--Tipo-->
                            <div class="col-md-6 mb-2">
                                <label for="tipo" class="form-label">Tipo</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="tipo" id="funcional"
                                        value="funcional" {{ $paciente->tipo == 'funcional' ? 'checked' : '' }} required>
                                    <label class="form-check-label" for="funcional">Funcional</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="tipo" id="disfuncional"
                                        value="disfuncional" {{ $paciente->tipo == 'disfuncional' ? 'checked' : '' }} required>
                                    <label class="form-check-label" for="disfuncional">Disfuncional</label>
                                </div>
                            </div>

                        </div>
                    </fieldset>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <fieldset>
                        <legend>Relaciones Familiares</legend>
                        <div class="row justify-content-between">
                            <div class="col-md-6 mb-2">
                                <div class="card">
                                    <div class="card-header text-center">
                                        <span class="h6">Relación Conyugal</span>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check form-check-inline">
                                            <input
                                                class="form-check-input"
                                                type="radio"
                                                name="conyugal"
                                                id="estables"
                                                value="estables" {{ $paciente->conyugal == 'estables' ? 'checked' : '' }}
                                                required
                                            >
                                            <label class="form-check-label" for="estables">Estables</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input
                                                class="form-check-input"
                                                type="radio"
                                                name="conyugal"
                                                id="estrecho"
                                                value="estrecho" {{ $paciente->conyugal == 'estrecho' ? 'checked' : '' }}
                                            >
                                            <label class="form-check-label" for="estrecho">Estrecho</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input
                                                class="form-check-input"
                                                type="radio"
                                                name="conyugal"
                                                id="distante"
                                                value="distante" {{ $paciente->conyugal == 'distante' ? 'checked' : '' }}
                                            >
                                            <label class="form-check-label" for="distante">Distante</label>
                                        </div>
                                        <div class="form-check form-check-inline m-0">
                                            <input
                                                class="form-check-input"
                                                type="radio"
                                                name="conyugal"
                                                id="conflictivo"
                                                value="conflictivo" {{ $paciente->conyugal == 'conflictivo' ? 'checked' : '' }}
                                            >
                                            <label class="form-check-label" for="conflictivo">Conflictivo</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input
                                                class="form-check-input"
                                                type="radio"
                                                id="otros-conyugal"
                                                value="otros-conyugal"
                                                name="conyugal"
                                            >
                                            <label class="form-check-label" for="otros-conyugal">Otros</label>
                                        </div>
                                        <!-- Se muestra según el radiobutton seleccionado-->
                                        <div id="input-otro-conyugal"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-2">
                                <div class="card">
                                    <div class="card-header text-center">
                                        <span class="h6">Relación Materno-Filial</span>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="materno"
                                                id="estables-materno" value="estables" {{ $paciente->materno == 'estables' ? 'checked' : '' }} required>
                                            <label class="form-check-label" for="estables-materno">Estables</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="materno"
                                                id="estrecho-materno" value="estrecho" {{ $paciente->materno == 'estrecho' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="estrecho-materno">Estrecho</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="materno"
                                                id="distante-materno" value="distante" {{ $paciente->materno == 'distante' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="distante-materno">Distante</label>
                                        </div>
                                        <div class="form-check form-check-inline m-0">
                                            <input class="form-check-input" type="radio" name="materno"
                                                id="conflictivo-materno" value="conflictivo" {{ $paciente->materno == 'conflictivo' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="conflictivo-materno">Conflictivo</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" id="otros-materno"
                                                value="otros-materno" name="materno">
                                            <label class="form-check-label" for="otros-materno">Otros</label>
                                        </div>
                                        <!-- Se muestra según el radiobutton seleccionado-->
                                        <div id="input-otro-materno"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-2">
                                <div class="card">
                                    <div class="card-header text-center">
                                        <span class="h6">Relación Paterno-Filial</span>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="paterno"
                                                id="estables-paterno" value="estables" {{ $paciente->paterno == 'estables' ? 'checked' : '' }} required>
                                            <label class="form-check-label" for="estables-paterno">Estables</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="paterno"
                                                id="estrecho-paterno" value="estrecho" {{ $paciente->paterno == 'estrecho' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="estrecho-paterno">Estrecho</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="paterno"
                                                id="distante-paterno" value="distante" {{ $paciente->paterno == 'distante' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="distante-paterno">Distante</label>
                                        </div>
                                        <div class="form-check form-check-inline m-0">
                                            <input class="form-check-input" type="radio" name="paterno"
                                                id="conflictivo-paterno" value="conflictivo" {{ $paciente->paterno == 'conflictivo' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="conflictivo-paterno">Conflictivo</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" id="otros-paterno"  name="paterno" value="otros-paterno"  {{ $paciente->paterno == 'otra cosa' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="otros-paterno">Otros</label>
                                        </div>
                                        <!-- Se muestra según el radiobutton seleccionado-->
                                        <div id="input-otro-paterno"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-2">
                                <div class="card">
                                    <div class="card-header text-center">
                                        <span class="h6">Relación Fraterno-Filial</span>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="fraterno"
                                                id="estables-fraterno" value="estables" {{ $paciente->fraterno == 'estables' ? 'checked' : '' }} required>
                                            <label class="form-check-label" for="estables-fraterno">Estables</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="fraterno"
                                                id="estrecho-fraterno" value="estrecho" {{ $paciente->fraterno == 'estrecho' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="estrecho-fraterno">Estrecho</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="fraterno"
                                                id="distante-fraterno" value="distante" {{ $paciente->fraterno == 'distante' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="distante-fraterno">Distante</label>
                                        </div>
                                        <div class="form-check form-check-inline m-0">
                                            <input class="form-check-input" type="radio" name="fraterno"
                                                id="conflictivo-fraterno" value="conflictivo" {{ $paciente->fraterno == 'conflictivo' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="conflictivo-fraterno">Conflictivo</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" id="otros-fraterno"
                                                value="otros-fraterno" name="fraterno">
                                            <label class="form-check-label" for="otros-fraterno">Otros</label>
                                        </div>
                                        <!-- Se muestra según el radiobutton seleccionado-->
                                        <div id="input-otro-fraterno"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>
        </div>
        <!--END Card group-->


        <!--START Car Group 3-->
        <div class="card-group mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="row d-flex justify-content-between mb-3">
                        <div class="col-md-12 my-2">
                            <label for="diagnostico_social" class="form-label">Diagnóstico Social:</label>
                            <div class="form-floating">
                                <textarea
                                    class="form-control"
                                    placeholder="Diagnóstico Social:"
                                    id="diagnostico_social"
                                    style="height: 120px"
                                    name="diagnostico_social"
                                    required
                                >{{ $paciente->diagnostico_social }}</textarea>
                                {{--  <label for="diagnostico_social">Diagnóstico Social:</label>  --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row d-flex justify-content-between mb-3">
                        <div class="col-md-12 my-2">
                            <label for="acciones" class="form-label">Acciones a Seguir:</label>
                            <div class="form-floating">
                                <textarea
                                    class="form-control"
                                    placeholder="Acciones a Seguir"
                                    id="acciones"
                                    style="height: 120px"
                                    name="acciones"
                                    required
                                >{{ $paciente->acciones }}</textarea>
                                {{--  <label for="acciones">Acciones a Seguir:</label>  --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-12">
                <button class="btn btn-primary" type="submit" id="submit">Actualizar</button>
            </div>
        </div>
    </form>
@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>

    <!-- JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/js/toastr.js"></script>

    {{--  <script>

        if ($("#formPacientes").length > 0) {
            $("#formPacientes").validate({

                rules: {
                    caso: { required: true },
                    fecha: { required: true },
                    hora: { required: true },
                    nombres: { required: true, maxlength: 70 },
                    edad: { required: true, maxlength: 3 },
                    sexo: { required: true },
                    direccion: { required: true, maxlength: 250 },
                    telefono: { required: true, maxlength: 9 },
                    telefono_referencia: { required: true, maxlength: 9 },
                    estado_civil: { required: true },
                    anios: { required: true, maxlength: 3 },
                    nombre_esposo: { required: true, maxlength: 70 },
                    edad_esposo: { required: true, maxlength: 2 },
                    grado_instruccion: { required: true },
                    cantidad_hijos: { required: true, maxlength: 2 },
                    ocupacion: { required: true, maxlength: 30 },
                    ingreso_mensual: { required: true, maxlength: 6 },
                    motivo_consulta: { required: true, maxlength: 300 },
                    historia_familiar: { required: true, maxlength: 350 },
                    tipo_familia: { required: true },
                    tipo: { required: true },
                    conyugal: { required: true },
                    materno: { required: true },
                    paterno: { required: true },
                    fraterno: { required: true },
                    diagnostico_social: { required: true, maxlength: 350 },
                    acciones: { required: true, maxlength: 350 },
                },

                messages: {
                    caso: {
                        required: "Por favor introduzca el número de caso.",
                        maxlength: "El caso no debe superar los 5 dígitos.",                    },
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
                        maxlength: "La edad no debe pasar los 3 dígitos.",
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
                        maxlength: "El teléfono no debe pasar los 9 dígitos.",
                    },
                    telefono_referencia: {
                        required: "Por favor digite el número de referencia",
                        maxlength: "El número de referencia no debe pasar los 9 dígitos.",
                    },
                    estado_civil: {
                        required: "Por favor seleccione una opción.",
                    },
                    anios: {
                        required: "Por favor indique los años.",
                        maxlength: "La edad no debe pasar los 3 dígitos.",
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
                        maxlength: "La descripción no debe superar los 300 caracteres",
                    },
                    historia_familiar: {
                        required: "Por favor describa la historia familiar.",
                        maxlength: "La descripción no debe superar los 350 caracteres",
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
                        maxlength: "La descripción no debe superar los 350 caracteres",
                    },
                    acciones: {
                        required: "Por favor describa las acciones a tomar.",
                        maxlength: "La descripción no debe superar los 350 caracteres",
                    },
                },
                submitHandler: function(form) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $('#submit').html('Actualizando...');
                    $("#submit").attr("disabled", true);
                    $.ajax({
                        url: "{{ route('paciente.update', $paciente->id) }}",
                        type: "PUT",
                        data: $('#formPacientes').serialize(),
                        success: function(data) {
                            $('#submit').html('Submit');
                            $("#submit").attr("disabled", false);
                            if (data.redirect_url) {
                                setTimeout(function() {
                                    window.location = data.redirect_url;
                                }, 1);
                                //toastr.success(data.success);
                            }
                            //alert('Ajax form has been submitted successfully');
                            //document.getElementById("formPacientes").reset();
                        },
                        error: function(data){
                            $("#submit").attr("disabled", false);
                            $('#submit').html('Actualizar');
                            //alert('El número de caso ya existe!');
                            //document.getElementById("caso").reset();
                            //console.log(data.error);

                        }
                    });
                }
            })
        }
    </script>  --}}

    {{--  <script>
        $(document).on("click", "#otros-conyugal", function(){
            $(this).text("It works!");
        });

        $(document).ready(function(){
            $("#otros-conyugal").trigger("click");
        });
    </script>  --}}

    <script>

        (function () {

            document.addEventListener("DOMContentLoaded", function (event) {
                eventListeners();
                mostrarInput(event);
                /*document.querySelector('#otros-conyugal').dispatchEvent(new Event('click'));
                document.querySelector('#otros-fraterno').dispatchEvent(new Event('click'));*/
            });

            function eventListeners() {
                // Muestra campos condicionales
                const metodoMostrarInputText_conyugal = document.querySelectorAll(
                    'input[name="conyugal"]'
                );
                const metodoMostrarInputText_materno = document.querySelectorAll(
                    'input[name="materno"]'
                );
                const metodoMostrarInputText_paterno = document.querySelectorAll(
                    'input[name="paterno"]'
                );
                const metodoMostrarInputText_fraterno = document.querySelectorAll(
                    'input[name="fraterno"]'
                );
                // console.log(metodoMostrarInputText_conyugal[0].name);
                // para iterar cuando sea más de 1, y añadir ese addEventListener
                metodoMostrarInputText_conyugal.forEach((input) =>
                    input.addEventListener("click", mostrarInputText_RelacionesFamiliares)
                );
        
                metodoMostrarInputText_materno.forEach((input) =>
                    input.addEventListener("click", mostrarInputText_RelacionesFamiliares)
                );
        
                metodoMostrarInputText_paterno.forEach((input) =>
                    input.addEventListener("click", mostrarInputText_RelacionesFamiliares)
                );
        
                metodoMostrarInputText_fraterno.forEach((input) =>
                    input.addEventListener("click", mostrarInputText_RelacionesFamiliares)
                );
            }

            

            function mostrarInputText_RelacionesFamiliares(e) {
                /** Para mostrar el cuadro de texto en caso de que necesite describir otro - Relacione Familiares */
                const inputOtro_conyugal = document.querySelector("#input-otro-conyugal");
                const inputOtro_materno = document.querySelector("#input-otro-materno");
                const inputOtro_paterno = document.querySelector("#input-otro-paterno");
                const inputOtro_fraterno = document.querySelector("#input-otro-fraterno");

                //console.log(e.target.name + ' => ' + e.target.value);
                /*let radioOtrosConyugal = document.getElementById('otros-conyugal');
                console.log("Valor: " + radioOtrosConyugal.value);*/

                if (e.target.value === "otros-conyugal") {
                    //console.log('SON IGUALES');
                    inputOtro_conyugal.innerHTML = `
                        <input type="text" class="form-control" id="otros-conyugal-I" name="conyugal" placeholder="Describa..." value="{{ $paciente->conyugal }}" required>
                        `;
                    /*let nuevo = document.getElementById('otros-conyugal-I').value;
                    console.log(nuevo);*/
                    console.log(inputOtro_conyugal);

                } else {
                    if (e.target.name === "conyugal") {
                        inputOtro_conyugal.innerHTML = "";
                    }
                }

                if (e.target.value === "otros-materno") {
                    inputOtro_materno.innerHTML = `
                        <input type="text" class="form-control" id="otros-materno" name="materno" placeholder="Describa..." value="{{ $paciente->materno }}" required>
                        `;
                    console.log(inputOtro_materno);

                } else {
                    if (e.target.name === "materno") {
                        inputOtro_materno.innerHTML = "";
                    }
                }
        
                if (e.target.value === "otros-paterno") {
                    inputOtro_paterno.innerHTML = `
                        <input type="text" class="form-control" id="otros-paterno" name="paterno" placeholder="Describa..." value="{{ $paciente->paterno }}" required>
                        `;
                    console.log(inputOtro_paterno);
                } else {
                    if (e.target.name === "paterno") {
                        inputOtro_paterno.innerHTML = "";
                    }
                }
        
                if (e.target.value === "otros-fraterno") {
                    inputOtro_fraterno.innerHTML = `
                        <input type="text" class="form-control" id="otros-fraterno-F" name="fraterno" placeholder="Describa..." value="{{ $paciente->fraterno }}" required>
                        `;
                    //let nuevoF = document.getElementById('otros-fraterno-F').value;
                    //console.log(nuevoF);
                    console.log(inputOtro_fraterno);
                } else {
                    if (e.target.name === "fraterno") {
                        inputOtro_fraterno.innerHTML = "";
                    }
                }
                //console.log(e.target.name + ' => ' + e.target.value);
            }

            function mostrarInput(e){
                //Inputs radio
                let radioOtrosConyugal = document.getElementById('otros-conyugal');
                let radioOtrosMaterno = document.getElementById('otros-materno');
                let radioOtrosPaterno = document.getElementById('otros-paterno');
                let radioOtrosFraterno = document.getElementById('otros-fraterno');

                //console.log(radioOtrosPaterno.name);
                //el e.targer.value no es buena idea, porque espera el click al parecer
                if(radioOtrosPaterno === 'otros-paterno' ){
                    
                }

                /** Conyugal */
                radioOtrosConyugal.addEventListener('click', e => {});
                radioOtrosConyugal.dispatchEvent(new Event('click'));
                radioOtrosConyugal.checked = true;

                /** Materno */
                radioOtrosMaterno.addEventListener('click', e => {});
                radioOtrosMaterno.dispatchEvent(new Event('click'));
                radioOtrosMaterno.checked = true;

                /** Paterno */
                radioOtrosPaterno.addEventListener('click', e => {});
                radioOtrosPaterno.dispatchEvent(new Event('click'));
                //radioOtrosPaterno.checked = true;

                /** Fraterno */
                radioOtrosFraterno.addEventListener('click', e => {});
                radioOtrosFraterno.dispatchEvent(new Event('click'));
                radioOtrosFraterno.checked = true;
            }
        })();
    </script>

@endpush
