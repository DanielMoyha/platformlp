@extends('layouts.dashboard')

@section('titulo')
    Registrar Nuevo Caso
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
        <li class="breadcrumb-item active">Formulario para registrar un Nuevo Caso</li>
    </ol>

    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong><i class="fa-solid fa-triangle-exclamation"></i> Tomar en cuenta!</strong>
        <span>Asegurese de introducir la cantidad exacta de hijos que tiene el paciente, por favor.</span>
        <small class="fst-italic">(Para evitar errores a futuro)</small>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    <div class="card border-1 mb-5">
        <div class="card-header text-center bg-info text-white fw-bold h4">
            Atención de Caso - Trabajo Social
        </div>

        {{-- <form class="needs-validation" action="{{ route('paciente.store') }}" method="POST" novalidate> --}}
        <form class="needs-validation" id="formPacientes" novalidate autocomplete="off">
            @csrf
            <div class="p-1">
                {{-- <div class="alert alert-danger print-error-msg" style="display:none">
                    <ul></ul>
                </div> --}}
                <!--Card group-->
                <div class="card-group mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row d-flex justify-content-between mb-3 mt-1">
                                <!--N° Caso-->
                                <div class="col-md-12 mb-2">
                                    <label class="visually-hidden" for="caso">Caso</label>
                                    <div class="input-group">
                                        <div class="input-group-text">N° Caso</div>
                                        <input type="number" class="form-control" id="caso" placeholder="Número de caso"
                                            name="caso" min="0" required>
                                    </div>
                                </div>
    
                                {{-- <!--Código de Paciente-->
                                <div class="col-md-7 mb-2">
                                    <label class="visually-hidden" for="codigo_paciente">Código</label>
                                    <div class="input-group">
                                        <div class="input-group-text">N°</div>
                                        <input type="number" class="form-control" id="codigo_paciente" placeholder="Cód. Paciente"
                                            name="codigo_paciente" required>
                                        <div class="invalid-feedback">
                                            Código de Paciente obligatorio
                                        </div>
                                    </div>
                                </div> --}}
    
                                <!--Fecha-->
                                <div class="col-md-7 mb-2">
                                    <label class="form-label fw-bold" for="fecha">Fecha</label>
                                    <div class="input-group">
                                        {{-- <div class="input-group-text">Fecha</div> --}}
                                        <input type="date" class="form-control" id="fecha" name="fecha" required>
                                        {{--  <div class="invalid-feedback">
                                            Establezca una fecha
                                        </div>  --}}
                                    </div>
                                </div>
    
                                <!--Hora-->
                                <div class="col-md-5 mb-2">
                                    <label class="form-label fw-bold" for="hora">Hora</label>
                                    <div class="input-group">
                                        {{-- <div class="input-group-text">Hora</div> --}}
                                        <input type="time" class="form-control" id="hora" name="hora" required>
                                        {{--  <div class="invalid-feedback">
                                            Establezca una hora
                                        </div>  --}}
                                    </div>
                                </div>
                            </div>
    
                            <div class="row d-flex justify-content-between mb-2">
                                <!--Nombre Completo-->
                                <div class="col-md-12 mb-2">
                                    <label for="nombres" class="form-label fw-bold">Nombres y Apellidos</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="nombres"
                                        name="nombres"
                                        placeholder="Nombre Completo"
                                        required
                                    >
                                    {{--  <div class="invalid-feedback">
                                        Nombre Completo Obligatorio
                                    </div>  --}}
                                </div>
    
                                <!--Edad-->
                                <div class="col-md-4 mb-2">
                                    <label for="edad" class="form-label fw-bold">Edad</label>
                                    <input type="number" class="form-control" id="edad" name="edad" min="0"
                                        placeholder="Edad" required>
                                    {{--  <div class="invalid-feedback">
                                        Introduzca la edad
                                    </div>  --}}
                                </div>
    
                                <!--Sexo-->
                                <div class="col-md-8 mb-2 p-md-0">
                                    <label for="sexo" class="form-label fw-bold">Sexo</label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input sexo" type="radio" name="sexo" id="masculino"
                                            value="0" required>
                                        <label class="form-check-label" for="masculino">Masculino</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input sexo" type="radio" name="sexo" id="femenino"
                                            value="1" required>
                                        <label class="form-check-label" for="femenino">Femenino</label>
                                    </div>
                                </div>
    
                                <!--Dirección-->
                                <div class="col-md-12">
                                    <label for="direccion" class="form-label fw-bold">Dirección</label>
                                    <textarea class="form-control" id="direccion" name="direccion" placeholder="Escriba la dirección" required></textarea>
                                    {{--  <div class="invalid-feedback">
                                        Introduzca la dirección
                                    </div>  --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row d-flex justify-content-between mb-3 mt-1">
                                <!--Teléfono-->
                                <div class="col-md-6 mb-2">
                                    <label for="telefono" class="form-label fw-bold">Teléfono</label>
                                    <input type="number" class="form-control" id="telefono" name="telefono" placeholder="00000000"
                                        required>
                                    {{--  <div class="invalid-feedback">
                                        Introduzca el teléfono
                                    </div>  --}}
                                </div>
    
                                <!--Número de Referencia-->
                                <div class="col-md-6 mb-2">
                                    <label for="telefono_referencia" class="form-label fw-bold">Num. Referencia</label>
                                    <input type="number" class="form-control" id="telefono_referencia"
                                        name="telefono_referencia" placeholder="00000000" required>
                                    {{--  <div class="invalid-feedback">
                                        Introduzca el número de referencia
                                    </div>  --}}
                                </div>
    
                                <!--Estado Civil-->
                                <div class="col-md-6 mb-2">
                                    <label for="estado_civil" class="form-label fw-bold">Estado Civil</label>
                                    <select class="form-select" id="estado_civil" name="estado_civil" required>
                                        <option selected disabled value="">-- Seleccione --</option>
                                        <option value="casado">Casado</option>
                                        <option value="Viudo">Viudo</option>
                                        <option value="Divorciado">Divorciado</option>
                                        <option value="Separado">Separado</option>
                                        <option value="Soltero">Soltero</option>
                                        <option value="Union Libre">Union Libre</option>
                                    </select>
                                    {{--  <div class="invalid-feedback">
                                        Escoga una opción, por favor.
                                    </div>  --}}
                                </div>
    
                                <!--Años-->
                                <div class="col-md-6 mb-2">
                                    <label for="anios" class="form-label fw-bold">Años</label>
                                    <input type="number" class="form-control" id="anios" name="anios" min="0"
                                        placeholder="Años del estado civil" required>
                                    {{--  <div class="invalid-feedback">
                                        Introduzca los años del estado civil
                                    </div>  --}}
                                </div>
    
                                <!--Nombres completo del Esposo-->
                                <div class="col-md-12 mb-2">
                                    <label for="nombre_esposo" class="form-label fw-bold">Nombres completo del Esposo(a)</label>
                                    <input type="text" class="form-control" id="nombre_esposo" name="nombre_esposo"
                                        placeholder="Nombre Completo" required>
                                    {{--  <div class="invalid-feedback">
                                        Nombre del Esposo Obligatorio
                                    </div>  --}}
                                </div>
    
                                <!--Edad del Esposo-->
                                <div class="col-md-5 mb-2">
                                    <label for="edad_esposo" class="form-label fw-bold">Edad Esposo(a)</label>
                                    <input type="number" class="form-control" id="edad_esposo" name="edad_esposo"
                                        min="0" placeholder="Edad esposo" required>
                                    {{--  <div class="invalid-feedback">
                                        Introduzca la edad del esposo
                                    </div>  --}}
                                </div>
    
                                <!--Grado de Instrucción-->
                                <div class="col-md-7 mb-2">
                                    <label for="grado_instruccion" class="form-label fw-bold">Grado de Instrucción</label>
                                    <select class="form-select" id="grado_instruccion" name="grado_instruccion" required>
                                        <option selected disabled value="">-- Seleccione --</option>
                                        <option value="Primaria">Primaria</option>
                                        <option value="Secundaria">Secundaria</option>
                                        <option value="Bachiller">Bachiller</option>
                                        <option value="Profesional">Profesional</option>
                                    </select>
                                    {{--  <div class="invalid-feedback">
                                        Escoga una grado, por favor.
                                    </div>  --}}
                                </div>
    
                                <!--Cantidad de Hijos-->
                                <div class="col-md-12 mb-2">
                                    <label for="cantidad_hijos" class="form-label fw-bold">Cantidad de Hijos</label>
                                    <input type="number" class="form-control" id="cantidad_hijos" name="cantidad_hijos"
                                        min="0" placeholder="Introduzca la cantidad de Hijos que tiene" required>
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
                                    <label for="ocupacion" class="form-label fw-bold">Ocupación</label>
                                    <input type="text" class="form-control" id="ocupacion" name="ocupacion"
                                        placeholder="Escriba la ocupación" required>
                                    {{--  <div class="invalid-feedback">
                                        Escriba la ocupación, por favor.
                                    </div>  --}}
                                </div>
    
                                <!--Ingreso Mensual-->
                                <div class="col-md-7 mb-2">
                                    <label class="form-label fw-bold" for="ingreso_mensual">Ingreso Mensual</label>
                                    <div class="input-group">
                                        <div class="input-group-text">Bs.</div>
                                        <input type="number" class="form-control" id="ingreso_mensual"
                                            placeholder="Digite en Bs." name="ingreso_mensual" min="0" required>
                                        {{--  <div class="invalid-feedback">
                                            El Ingreso Mensual es obligatorio
                                        </div>  --}}
                                    </div>
                                </div>
    
                                <!--Motivo de Consulta-->
                                <div class="col-md-12">
                                    <label for="motivo_consulta" class="form-label fw-bold">Motivo de Consulta</label>
                                    <textarea class="form-control" id="motivo_consulta" name="motivo_consulta"
                                        placeholder="Describa el motivo de la consulta" rows="7" required></textarea>
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
                        <div class="card-header text-center bg-secondary text-white fw-bold h4">Entrevista Inicial</div>
                        {{-- <div class="card-header">Entrevista Incial</div> --}}
                        <div class="card-body">
                            <!--Entrevista Inicial-->
                            {{--  <legend>Entrevista Inicial</legend>  --}}
                            <div class="row d-flex justify-content-between mb-2">
                                <!--Historia Familiar-->
                                <div class="col-md-12 mb-3">
                                    <label for="historia_familiar" class="form-label fw-bold">Historia Familiar</label>
                                    <textarea class="form-control" id="historia_familiar" name="historia_familiar"
                                        placeholder="Describa la historia familiar del paciente" rows="5" required></textarea>
                                    {{--  <div class="invalid-feedback">
                                        Describa la historia familiar, por favor.
                                    </div>  --}}
                                </div>
    
                                <!--Tipo de Familia-->
                                <div class="col-md-6 mb-2">
                                    <label for="tipo_familia" class="form-label fw-bold">Tipo de Familia</label>
                                    <select class="form-select" id="tipo_familia" name="tipo_familia" required>
                                        <option selected disabled value="">-- Seleccione --</option>
                                        <option value="Monoparental">Monoparental</option>
                                        <option value="Nuclear">Nuclear</option>
                                        <option value="Extensa">Extensa</option>
                                        <option value="Ampliada">Ampliada</option>
                                        <option value="Reconstituida">Reconstituida</option>
                                    </select>
                                    {{--  <div class="invalid-feedback">
                                        Elija el tipo de familia, por favor.
                                    </div>  --}}
                                </div>
    
                                <!--Tipo-->
                                <div class="col-md-6 mb-2">
                                    <label for="sexo" class="form-label fw-bold">Tipo</label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="tipo" id="funcional"
                                            value="funcional" required>
                                        <label class="form-check-label" for="funcional">Funcional</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="tipo" id="disfuncional"
                                            value="disfuncional" required>
                                        <label class="form-check-label" for="disfuncional">Disfuncional</label>
                                    </div>
                                </div>
    
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header text-center bg-secondary text-white fw-bold h4">Relación con los Familiares</div>
                        <div class="card-body">
                            <div class="row justify-content-between">
                                <div class="col-md-6 mb-2">
                                    <div class="card">
                                        <div class="card-header text-center">
                                            <span class="h6">Relación Conyugal</span>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="conyugal"
                                                    id="estables" value="estables" required>
                                                <label class="form-check-label" for="estables">Estables</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="conyugal"
                                                    id="estrecho" value="estrecho">
                                                <label class="form-check-label" for="estrecho">Estrecho</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="conyugal"
                                                    id="distante" value="distante">
                                                <label class="form-check-label" for="distante">Distante</label>
                                            </div>
                                            <div class="form-check form-check-inline m-0">
                                                <input class="form-check-input" type="radio" name="conyugal"
                                                    id="conflictivo" value="conflictivo">
                                                <label class="form-check-label" for="conflictivo">Conflictivo</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" id="otros-conyugal"
                                                    value="otros-conyugal" name="conyugal">
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
                                                    id="estables-materno" value="estables" required>
                                                <label class="form-check-label" for="estables-materno">Estables</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="materno"
                                                    id="estrecho-materno" value="estrecho">
                                                <label class="form-check-label" for="estrecho-materno">Estrecho</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="materno"
                                                    id="distante-materno" value="distante">
                                                <label class="form-check-label" for="distante-materno">Distante</label>
                                            </div>
                                            <div class="form-check form-check-inline m-0">
                                                <input class="form-check-input" type="radio" name="materno"
                                                    id="conflictivo-materno" value="conflictivo">
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
                                                    id="estables-paterno" value="estables" required>
                                                <label class="form-check-label" for="estables-paterno">Estables</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="paterno"
                                                    id="estrecho-paterno" value="estrecho">
                                                <label class="form-check-label" for="estrecho-paterno">Estrecho</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="paterno"
                                                    id="distante-paterno" value="distante">
                                                <label class="form-check-label" for="distante-paterno">Distante</label>
                                            </div>
                                            <div class="form-check form-check-inline m-0">
                                                <input class="form-check-input" type="radio" name="paterno"
                                                    id="conflictivo-paterno" value="conflictivo">
                                                <label class="form-check-label" for="conflictivo-paterno">Conflictivo</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" id="otros-paterno"
                                                    value="otros-paterno" name="paterno">
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
                                                    id="estables-fraterno" value="estables" required>
                                                <label class="form-check-label" for="estables-fraterno">Estables</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="fraterno"
                                                    id="estrecho-fraterno" value="estrecho">
                                                <label class="form-check-label" for="estrecho-fraterno">Estrecho</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="fraterno"
                                                    id="distante-fraterno" value="distante">
                                                <label class="form-check-label" for="distante-fraterno">Distante</label>
                                            </div>
                                            <div class="form-check form-check-inline m-0">
                                                <input class="form-check-input" type="radio" name="fraterno"
                                                    id="conflictivo-fraterno" value="conflictivo">
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
                        </div>
                    </div>
                </div>
                <!--END Card group-->

                <!--START Car Group 3-->
                <div class="card-group mb-3">
                    <div class="card">
                        <div class="card-header text-center bg-secondary text-white fw-bold h4">Conclusiones</div>
                        <div class="card-body">
                            <div class="row d-flex justify-content-between mb-3">
                                <div class="col-md-6 my-2">
                                    <label for="diagnostico_social" class="form-label fw-bold">Diagnóstico Social:</label>
    
                                    <textarea
                                        id="diagnostico_social"
                                        name="diagnostico_social"
                                        class="form-control"
                                        placeholder="Describa el diagnóstico social..."
                                        style="height: 120px"
                                        required
                                    ></textarea>
                                </div>
                                <div class="col-md-6 my-2">
                                    <label for="acciones" class="form-label fw-bold">Acciones a Seguir:</label>
                                    <textarea
                                        id="acciones"
                                        name="acciones"
                                        class="form-control"
                                        placeholder="Describa todas las acciones vea conveniente"
                                        style="height: 120px"
                                        required
                                    ></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--  <div class="card">
                        <div class="card-body">
                            <div class="row d-flex justify-content-between mb-3">
                                <div class="col-md-12 my-2">
                                    <label for="acciones" class="form-label">Acciones a Seguir:</label>
                                    <div class="form-floating">
                                        <textarea class="form-control" placeholder="Acciones a Seguir" id="acciones" style="height: 120px"
                                            name="acciones" required></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>  --}}
                    {{-- <div class="card">
                        <div class="card-body">
                            <div class="row d-flex justify-content-between mb-3">
                                <!--Encargada-->
                                <label for="asignar" class=" col-form-label fw-bold">Encargada:</label>
                                <div class="col-sm-8">
                                    <select name="user_id" class="form-control">
                                        <option value=""> -- Seleccione --</option>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}">
                                                {{ $user->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-end">
                <a href="{{ route('home') }}" class="btn btn-danger mx-2">Cancelar</a>
                <button type="submit" class="btn btn-success" id="submit">Guardar Caso</button>
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

    <script type="text/javascript">
        /*$(document).ready(function() {
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toast-bottom-right",
                "preventDuplicates": true,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "2500",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $("#submit").click(function(e) {

                e.preventDefault();

                $.ajax({
                    type: 'POST',
                    url: "{{ route('paciente.store') }}",
                    data: $("#formPacientes").serialize(),
                    success: function(data) {
                        // para redigir a otra página, en caso de que no redigira, borrar todo el if
                        if (data.redirect_url) {
                            setTimeout(function() {
                                window.location = data.redirect_url;
                            }, 2500);
                            toastr.success(data.success);
                        }

                        $('#submit').html('Submit');
                        $("#submit").attr("disabled", false);
                        //alert('Ajax form has been submitted successfully');
                        document.getElementById("formPacientes").reset();
                    }
                });

            });
        });*/

        /*function submitData(){
            document.getElementById("formPacientes").submit();
            document.getElementById("formPacientesHijos").submit();
        }*/
    </script>

    <script>
        if ($("#formPacientes").length > 0) {
            $("#formPacientes").validate({

                rules: {
                    caso: {
                        required: true,
                        maxlength: 5,
                        remote: {
                            url: "{{ route('paciente.validar.caso') }}",
                            type: "GET",
                            data: {
                                caso: function () {
                                    return $("input[name='caso']").val();
                                }
                            },
                            dataFilter: function (data) {
                                var json = JSON.parse(data);
                                if (json.msg == "true") {
                                    return "\"" + "El número de caso ya existe, digite otro por favor." + "\"";
                                } else {
                                    return 'true';
                                }
                            }
                        }
                    },
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
                    $('#submit').html('Espere por favor...');
                    $("#submit").attr("disabled", true);
                    $.ajax({
                        url: "{{ route('paciente.store') }}",
                        type: "POST",
                        data: $('#formPacientes').serialize(),
                        success: function(data) {
                            $('#submit').html('Guardar Caso');
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
                            $('#submit').html('Guardar Caso');
                            //alert('El número de caso ya existe!');
                            //document.getElementById("caso").reset();
                            //console.log(data.error);

                        }
                    });
                }
            })
        }
    </script>
@endpush
