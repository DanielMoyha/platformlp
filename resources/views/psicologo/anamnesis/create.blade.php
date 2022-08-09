@extends('layouts.dashboard_Psico')

@section('titulo')
    Anamnesis
@endsection

@push('styles')
    <!-- CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/css/toastr.css" rel="stylesheet" />
    <style>
        .font-bold{
            font-weight: 600;
        }
    </style>
@endpush

@section('content')
    <div class="row">
        <div class="col-md-6">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">Creación del formulario Anamnesis</li>
            </ol>
        </div>
        <div class="col-md-6 mb-3">
            <span class="d-md-flex justify-content-end">
                <a href="{{ route('casos.list') }}" class="btn btn-danger text-white fw-bold"><i class="fa-solid fa-arrow-left"></i> Regresar</a>
            </span>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-sm border-0 rounded-3 mb-4">
                <div class="card-header text-center bg-info text-white fw-bold h5">Datos del Paciente</div>
                <div class="card-body">
                    <h5 class="card-title text-muted">Datos personales</h5>
                    <div class="row">
                        <div class="col-md-5">
                            <span class="form-label fw-bold-600">Paciente:</span>
                            <span class="fst-italic"> {{ $hijo->nombre }}</span>
                        </div>
                        <div class="col-md-3">
                            <span class="form-label fw-bold-600">Nombres </span><span class="fst-italic text-muted">(madre, padre o tutores):</span>
                        </div>
                        <div class="col-md-4">
                            <ul>
                                <li class="fst-italic">{{ $hijo->paciente->nombres }}</li>
                                <li class="fst-italic">{{ $hijo->paciente->nombre_esposo }}</li>
                            </ul>
                        </div>
                        <div class="col-md-5">
                            <span class="form-label fw-bold-600">Edad:</span>
                            <span class="fst-italic"> {{ $hijo->edad }}</span>
                        </div>
                        <div class="col-md-6">
                            <span class="form-label fw-bold-600">Sexo:</span>
                            <span class="fst-italic"> {{ $hijo->sexo }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--  @if (!$existAnamnesis)
        <h1 class="text-danger">NO existe</h1>
    @else
        <h1 class="text-dark">Ya existe</h1>
    @endif  --}}
    @if (!$existAnamnesis)

        {{--  <form action="{{ route('anamnesis.store') }}" method="post" class="needs-validation" novalidate>  --}}
        <form action="{{ route('anamnesis.store') }}" method="post" class="needs-validation" novalidate>
            @csrf
            <input type="text" name="hijo_id" value="{{ $hijo->id }}" hidden>
            <input type="text" name="user_id" value="{{ auth()->user()->id }}" hidden>
            <div class="row">
                <div class="card-group">
                    <!--EMBARAZO-->
                    <div class="card">
                        <div class="card-header text-center bg-secondary text-white fw-bold h5">Embarazo</div>
                        <div class="card-body">
                            <div class="row">
                                <!--1. Duración del embarazo-->
                                <div class="col-md-8 mb-3">
                                    <label for="em_duracion" class="form-label">
                                        1. Duración del embarazo
                                    </label>
                                    <input
                                        type="number"
                                        class="form-control @error('em_duracion') is-invalid @enderror"
                                        id="em_duracion"
                                        min="0"
                                        value="{{ old('em_duracion') }}"
                                        name="em_duracion"
                                        placeholder="Cantidad en meses"
                                        required
                                    />
                                    <div class="invalid-feedback">
                                        Por favor, digite la cantidad.
                                    </div>
                                    @error('em_duracion')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!--2. Enfermedades durante el embarazo-->
                                <div class="col-md-12 mb-3">
                                    <label for="em_enfermedades" class="form-label">
                                        2. Enfermedades durante el embarazo
                                    </label>
                                    <div class="d-flex justify-content-around">
                                        <div class="form-check form-check-inline">
                                            <input
                                                class="form-check-input @error('em_enfermedades') is-invalid @enderror"
                                                type="checkbox"
                                                name="em_enfermedades"
                                                id="si"
                                                value="Si" {{ old('em_enfermedades') == "Si" ? 'checked' : '' }}
                                            >
                                            <label class="form-check-label" for="si">Sí</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input
                                                class="form-check-input @error('em_enfermedades') is-invalid @enderror"
                                                type="checkbox"
                                                name="em_enfermedades"
                                                id="no"
                                                value="No" {{ old('em_enfermedades') == "No" ? 'checked' : '' }}
                                            >
                                            <label class="form-check-label" for="no">No</label>
                                        </div>
                                        <input
                                            type="text"
                                            class="form-control"
                                            name="em_enfermedades"
                                            placeholder="Señales..."
                                            value="{{ old('em_enfermedades') }}"
                                        >
                                    </div>
                                </div>

                                <!--3. Fue un embarazo planificado-->
                                <div class="col-md-12 mb-3">
                                    <label for="" class="form-label">
                                        3. Fue un embarazo planificado
                                    </label>
                                    <div class="d-flex justify-content-center">
                                        <div class="form-check form-check-inline">
                                            <input
                                                class="form-check-input"
                                                type="radio"
                                                name="em_planificacion"
                                                id="plan_si"
                                                value="Si" {{ old('em_planificacion') == "Si" ? 'checked' : '' }}
                                                required
                                            >
                                            <label class="form-check-label" for="plan_si">Sí</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input
                                                class="form-check-input"
                                                type="radio"
                                                name="em_planificacion"
                                                id="plan_no"
                                                value="No" {{ old('em_planificacion') == "No" ? 'checked' : '' }}
                                                required
                                            >
                                            <label class="form-check-label" for="plan_no">No</label>
                                            <div class="invalid-feedback">
                                                Por favor, seleccione una opción.
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--4.	Que se esperaba que fuera el bebé-->
                                <div class="col-md-12 mb-3">
                                    <label for="" class="form-label">
                                        4. Qué se esperaba que fuera el bebé
                                    </label>
                                    <div class="d-flex justify-content-around">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="em_genero_esperado" id="mujer"
                                                value="mujer" {{ old('em_genero_esperado') == "mujer" ? 'checked' : '' }} required>
                                            <label class="form-check-label" for="mujer">Mujer</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="em_genero_esperado" id="varon"
                                                value="varon" {{ old('em_genero_esperado') == "varon" ? 'checked' : '' }} required>
                                            <label class="form-check-label" for="varon">Varón</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" id="indiferente" name="em_genero_esperado"
                                                value="indiferente" {{ old('em_genero_esperado') == "indiferente" ? 'checked' : '' }} required>
                                            <label class="form-check-label" for="indiferente">Indiferente</label>
                                        </div>
                                        <div class="invalid-feedback">
                                            Por favor, seleccione una opción.
                                        </div>
                                    </div>
                                </div>

                                <!--5.	Golpes y caídas durante el embarazo -->
                                <div class="col-md-12 mb-3">
                                    <label for="" class="form-label">
                                        5. Golpes y caídas durante el embarazo
                                    </label>
                                    <div class="d-flex justify-content-center">
                                        <div class="form-check form-check-inline">
                                            <input
                                                class="form-check-input"
                                                type="radio"
                                                name="em_lesiones"
                                                id="em_lesiones_si"
                                                value="si" {{ old('em_lesiones') == "si" ? 'checked' : '' }}
                                                required
                                            >
                                            <label class="form-check-label" for="em_lesiones_si">Sí</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input
                                                class="form-check-input"
                                                type="radio"
                                                name="em_lesiones"
                                                id="em_lesiones_no"
                                                value="no" {{ old('em_lesiones') == "no" ? 'checked' : '' }}
                                                required
                                            >
                                            <label class="form-check-label" for="em_lesiones_no">No</label>
                                            <div class="invalid-feedback">
                                                Por favor, seleccione una opción.
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--6.	Estado emocional de la madre y de la familia -->
                                <div class="col-md-12 mb-3">
                                    <label for="" class="form-label">
                                        6. Estado emocional de la madre y de la familia
                                    </label>
                                    <div class="d-flex justify-content-around">
                                        <div class="form-check form-check-inline">
                                            <input
                                                class="form-check-input"
                                                type="radio"
                                                name="em_estado_emocional"
                                                id="estable"
                                                value="Estable" {{ old('em_estado_emocional') == "Estable" ? 'checked' : '' }}
                                                required
                                            >
                                            <label class="form-check-label" for="estable">Estable</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input
                                                class="form-check-input"
                                                type="radio"
                                                name="em_estado_emocional"
                                                id="regular"
                                                value="Regular" {{ old('em_estado_emocional') == "Regular" ? 'checked' : '' }}
                                                required
                                            >
                                            <label class="form-check-label" for="regular">Regular</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input
                                                class="form-check-input"
                                                type="radio"
                                                id="inestable"
                                                name="em_estado_emocional"
                                                value="Inestable" {{ old('em_estado_emocional') == "Inestable" ? 'checked' : '' }}
                                                required
                                            >
                                            <label class="form-check-label" for="inestable">Inestable</label>
                                            <div class="invalid-feedback">
                                                Por favor, seleccione una opción.
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--7.	Ha tenido una alimentación-->
                                <div class="col-md-12 mb-3">
                                    <label for="" class="form-label">
                                        7. Ha tenido una alimentación
                                    </label>
                                    <div class="d-flex justify-content-around">
                                        <div class="form-check form-check-inline">
                                            <input
                                                class="form-check-input"
                                                type="radio"
                                                name="em_alimentacion"
                                                id="buena"
                                                value="Buena" {{ old('em_alimentacion') == "Buena" ? 'checked' : '' }}
                                                required
                                            >
                                            <label class="form-check-label" for="buena">Buena</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input
                                                class="form-check-input"
                                                type="radio"
                                                name="em_alimentacion"
                                                id="alimentacion_regular"
                                                value="Regular" {{ old('em_alimentacion') == "Regular" ? 'checked' : '' }}
                                                required
                                            >
                                            <label class="form-check-label" for="alimentacion_regular">Regular</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input
                                                class="form-check-input"
                                                type="radio"
                                                id="mala"
                                                name="em_alimentacion"
                                                value="Mala" {{ old('em_alimentacion') == "Mala" ? 'checked' : '' }}
                                                required
                                            >
                                            <label class="form-check-label" for="mala">Mala</label>
                                            <div class="invalid-feedback">
                                                Por favor, seleccione una opción.
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--8.	La madre realizo seguimiento médico prenatal-->
                                <div class="col-md-12 mb-3">
                                    <label for="" class="form-label">
                                        8. La madre realizo seguimiento medico prenatal
                                    </label>
                                    <div class="d-flex justify-content-center">
                                        <div class="form-check form-check-inline">
                                            <input
                                                class="form-check-input"
                                                type="radio"
                                                name="em_seguimiento_medico"
                                                id="seguimiento_si"
                                                value="Si" {{ old('em_seguimiento_medico') == "Si" ? 'checked' : '' }}
                                                required
                                            >
                                            <label class="form-check-label" for="seguimiento_si">Sí</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input
                                                class="form-check-input"
                                                type="radio"
                                                name="em_seguimiento_medico"
                                                id="seguimiento_no"
                                                value="No" {{ old('em_seguimiento_medico') == "No" ? 'checked' : '' }}
                                                required
                                            >
                                            <label class="form-check-label" for="seguimiento_no">No</label>
                                            <div class="invalid-feedback">
                                                Por favor, seleccione una opción.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--PARTO-->
                    <div class="card">
                        <div class="card-header text-center bg-secondary text-white fw-bold h5">Parto</div>
                        <div class="card-body">
                            <div class="row">
                                <!--1. ¿Dónde fue atendido?-->
                                <div class="col-md-12 mb-3">
                                    <label for="" class="form-label">
                                        1. ¿Dónde fue atendido?
                                    </label>
                                    <div class="d-flex justify-content-around">
                                        <div class="form-check form-check-inline">
                                            <input
                                                class="form-check-input"
                                                type="checkbox"
                                                name="pr_lugar_atencion"
                                                id="maternologico"
                                                value="Maternologico" {{ old('pr_lugar_atencion') == "Maternologico" ? 'checked' : '' }}
                                            >
                                            <label class="form-check-label" for="maternologico">Maternológico</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input
                                                class="form-check-input"
                                                type="checkbox"
                                                name="pr_lugar_atencion"
                                                id="casa"
                                                value="Casa" {{ old('pr_lugar_atencion') == "Casa" ? 'checked' : '' }}
                                            >
                                            <label class="form-check-label" for="casa">Casa</label>
                                        </div>
                                        <input
                                            type="text"
                                            class="form-control"
                                            name="pr_lugar_atencion"
                                            placeholder="Otro..."
                                            value="{{ old('pr_lugar_atencion') }}"
                                        />
                                    </div>
                                </div>

                                <!--2.	¿Quién lo atendió?-->
                                <div class="col-md-12 mb-3">
                                    <label for="" class="form-label">
                                        2. ¿Quién lo atendió?
                                    </label>
                                    <div class="d-flex justify-content-around">
                                        <div class="form-check form-check-inline">
                                            <input
                                                class="form-check-input"
                                                type="radio"
                                                name="pr_atendido_por"
                                                id="medico"
                                                value="Médico" {{ old('pr_atendido_por') == "Médico" ? 'checked' : '' }}
                                                required
                                            >
                                            <label class="form-check-label" for="medico">Médico</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input
                                                class="form-check-input"
                                                type="radio"
                                                name="pr_atendido_por"
                                                id="familiar"
                                                value="Familiar" {{ old('pr_atendido_por') == "Familiar" ? 'checked' : '' }}
                                                required
                                            >
                                            <label class="form-check-label" for="familiar">Familiar</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input
                                                class="form-check-input"
                                                type="radio"
                                                id="partera"
                                                name="pr_atendido_por"
                                                value="Partera" {{ old('pr_atendido_por') == "Partera" ? 'checked' : '' }}
                                                required
                                            >
                                            <label class="form-check-label" for="partera">Partera</label>
                                            <div class="invalid-feedback">
                                                Por favor, seleccione una opción.
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--3.	La duración del trabajo de parto fue: -->
                                <div class="col-md-12 mb-3">
                                    <label for="" class="form-label">
                                        3. La duración del trabajo de parto fue:
                                    </label>
                                    <div class="d-flex justify-content-around">
                                        <div class="form-check form-check-inline">
                                            <input
                                                class="form-check-input"
                                                type="radio"
                                                name="pr_duracion"
                                                id="muy_largo"
                                                value="Muy largo" {{ old('pr_duracion') == "Muy largo" ? 'checked' : '' }}
                                                required
                                            />
                                            <label class="form-check-label" for="muy_largo">Muy largo</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input
                                                class="form-check-input"
                                                type="radio"
                                                name="pr_duracion"
                                                id="normal"
                                                value="Normal" {{ old('pr_duracion') == "Normal" ? 'checked' : '' }}
                                                required
                                            />
                                            <label class="form-check-label" for="normal">Normal</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input
                                                class="form-check-input"
                                                type="radio"
                                                id="largo"
                                                name="pr_duracion"
                                                value="Largo" {{ old('pr_duracion') == "Largo" ? 'checked' : '' }}
                                                required
                                            />
                                            <label class="form-check-label" for="largo">Largo</label>
                                            <div class="invalid-feedback">
                                                Por favor, seleccione una opción.
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--4.	El parto fue: -->
                                <div class="col-md-12 mb-3">
                                    <label for="" class="form-label">
                                        4. El parto fue:
                                    </label>
                                    <div class="d-flex justify-content-around">
                                        <div class="form-check form-check-inline">
                                            <input
                                                class="form-check-input"
                                                type="radio"
                                                name="pr_estado"
                                                id="parto_normal"
                                                value="Normal" {{ old('pr_estado') == "Normal" ? 'checked' : '' }}
                                                required
                                            />
                                            <label class="form-check-label" for="parto_normal">Normal</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input
                                                class="form-check-input"
                                                type="radio"
                                                name="pr_estado"
                                                id="parto_complicado"
                                                value="Complicado" {{ old('pr_estado') == "Complicado" ? 'checked' : '' }}
                                                required
                                            />
                                            <label class="form-check-label" for="parto_complicado">Complicado</label>
                                            <div class="invalid-feedback">
                                                Por favor, seleccione una opción.
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--5.	¿Qué complicaciones se presentaron?-->
                                <div class="col-md-12 mb-3">
                                    <label class="form-label" for="complicaciones">
                                        5. ¿Qué complicaciones se presentaron?
                                    </label>
                                    <textarea
                                        class="form-control"
                                        id="complicaciones"
                                        name="pr_complicaciones"
                                        placeholder="Describa las complicaciones"
                                        required
                                    >{{ old('pr_complicaciones') }}</textarea>
                                    <div class="invalid-feedback">
                                        Describa el motivo, por favor.
                                    </div>
                                </div>

                                <!--6. Durante el parto se empleo-->
                                <div class="col-md-12 mb-3">
                                    <label for="" class="form-label">
                                        6. Durante el parto se empleo
                                    </label>
                                    <div class="d-flex justify-content-around">
                                        <div class="form-check form-check-inline">
                                            <input
                                                class="form-check-input"
                                                type="radio"
                                                name="pr_tipo"
                                                id="forceps"
                                                value="Fórceps" {{ old('pr_tipo') == "Fórceps" ? 'checked' : '' }}
                                                required
                                            />
                                            <label class="form-check-label" for="forceps">Fórceps</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input
                                                class="form-check-input"
                                                type="radio"
                                                name="pr_tipo"
                                                id="anestecia"
                                                value="Anestecia" {{ old('pr_tipo') == "Anestecia" ? 'checked' : '' }}
                                                required
                                            />
                                            <label class="form-check-label" for="anestecia">Anestecia</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input
                                                class="form-check-input"
                                                type="radio"
                                                id="cesarea"
                                                name="pr_tipo"
                                                value="Cesárea" {{ old('pr_tipo') == "Cesárea" ? 'checked' : '' }}
                                                required
                                            />
                                            <label class="form-check-label" for="cesarea">Cesárea</label>
                                            <div class="invalid-feedback">
                                                Por favor, seleccione una opción.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--Recién Nacido-->
                    <div class="card">
                        <div class="card-header text-center bg-secondary text-white fw-bold h5">Recién Nacido</div>
                        <div class="card-body">
                            <div class="row">
                                <!--1. APGAR-->
                                <div class="col-md-12 mb-3">
                                    <label for="" class="form-label">
                                        1. APGAR
                                    </label>
                                    <div class="d-flex justify-content-around">
                                        <div>
                                            <input
                                                class="form-control"
                                                type="text"
                                                name="rn_apgar"
                                                id="apgar_si"
                                                placeholder="Sí, Cuáles..."
                                                value="{{ old('rn_apgar') }}"
                                                required
                                            />
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input
                                                class="form-check-input"
                                                type="checkbox"
                                                name="rn_apgar"
                                                id="apgar_no"
                                                value="No" {{ old('apgar_no') == "No" ? 'checked' : '' }}
                                            >
                                            <label class="form-check-label" for="apgar_no">No</label>
                                            <div class="invalid-feedback">
                                                Por favor, responda esta pregunta.
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--2. Peso del niño al nacer-->
                                <div class="col-md-7 mb-3">
                                    <label for="peso" class="form-label">
                                        2. Peso del niño al nacer
                                    </label>
                                    <div class="input-group">
                                        <input
                                            type="number"
                                            class="form-control"
                                            id="peso"
                                            min="0"
                                            name="rn_peso"
                                            placeholder="Peso"
                                            value="{{ old('rn_peso') }}"
                                            required
                                        />
                                        <div class="input-group-text">Kg</div>
                                    </div>
                                    <div class="invalid-feedback">
                                        Por favor, digite la cantidad.
                                    </div>
                                </div>

                                <!--3. Al nacer el niño tenía color aproximado al:-->
                                <div class="col-md-12 mb-3">
                                    <label for="" class="form-label">
                                        3. Al nacer el niño tenía color aproximado al:
                                    </label>
                                    <div class="d-flex justify-content-between flex-column">
                                        <div class="form-check form-check-inline">
                                            <input
                                                class="form-check-input"
                                                type="checkbox"
                                                name="rn_color"
                                                id="morado"
                                                value="Morado" {{ old('rn_color') == "Morado" ? 'checked' : '' }}
                                            />
                                            <label class="form-check-label" for="morado">Morado</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input
                                                class="form-check-input"
                                                type="checkbox"
                                                name="rn_color"
                                                id="negrusco"
                                                value="Negrusco" {{ old('rn_color') == "Negrusco" ? 'checked' : '' }}
                                            />
                                            <label class="form-check-label" for="negrusco">Negrusco</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input
                                                class="form-check-input"
                                                type="checkbox"
                                                name="rn_color"
                                                id="azul"
                                                value="Azul" {{ old('rn_color') == "Azul" ? 'checked' : '' }}
                                            />
                                            <label class="form-check-label" for="azul">Azul</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input
                                                class="form-check-input"
                                                type="checkbox"
                                                name="rn_color"
                                                id="rosado"
                                                value="Rosado" {{ old('rn_color') == "Rosado" ? 'checked' : '' }}
                                            />
                                            <label class="form-check-label" for="rosado">Rosado</label>
                                        </div>
                                        <div>
                                            <input
                                                class="form-control"
                                                type="text"
                                                name="rn_color"
                                                id="apgar_si"
                                                placeholder="Otro..."
                                                value="{{ old('rn_color') }}"
                                            >
                                        </div>
                                        <div class="invalid-feedback">
                                            Por favor, seleccione una opción.
                                        </div>
                                    </div>
                                </div>

                                <!--4. ¿El niño lloro inmediatamente después de haber nacido?-->
                                <div class="col-md-12 mb-3">
                                    <label for="" class="form-label">
                                        4. ¿El niño lloró inmediatamente después de haber nacido?
                                    </label>
                                    <div class="d-flex justify-content-center">
                                        <div class="form-check form-check-inline">
                                            <input
                                                class="form-check-input"
                                                type="radio"
                                                name="rn_llorar"
                                                id="llorar_si"
                                                value="Si" {{ old('rn_llorar') == "Si" ? 'checked' : '' }}
                                                required
                                            />
                                            <label class="form-check-label" for="llorar_si">Sí</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input
                                                class="form-check-input"
                                                type="radio"
                                                name="rn_llorar"
                                                id="llorar_no"
                                                value="No" {{ old('rn_llorar') == "No" ? 'checked' : '' }}
                                                required
                                            />
                                            <label class="form-check-label" for="llorar_no">No</label>
                                            <div class="invalid-feedback">
                                                Por favor, seleccione una opción.
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--5. ¿Fue necesario el uso de incubadora?-->
                                <div class="col-md-12 mb-3">
                                    <label for="" class="form-label">
                                        5. ¿Fue necesario el uso de incubadora?
                                    </label>
                                    <div class="d-flex justify-content-center">
                                        <div class="form-check form-check-inline">
                                            <input
                                                class="form-check-input"
                                                type="radio"
                                                name="rn_incubadora"
                                                id="incubadora_si"
                                                value="Si" {{ old('rn_incubadora') == "Si" ? 'checked' : '' }}
                                                required
                                            />
                                            <label class="form-check-label" for="incubadora_si">Sí</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input
                                                class="form-check-input"
                                                type="radio"
                                                name="rn_incubadora"
                                                id="incubadora_no"
                                                value="No" {{ old('rn_incubadora') == "No" ? 'checked' : '' }}
                                                required
                                            />
                                            <label class="form-check-label" for="incubadora_no">No</label>
                                            <div class="invalid-feedback">
                                                Por favor, seleccione una opción.
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--6. ¿Cerraba la mano cuando se colocaba un objeto o un dedo?-->
                                <div class="col-md-12 mb-3">
                                    <label for="" class="form-label">
                                        6. ¿Cerraba la mano cuando se colocaba un objeto o un dedo?
                                    </label>
                                    <div class="d-flex justify-content-center">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="rn_posicion_mano" id="mano_si"
                                                value="Si" {{ old('rn_posicion_mano') == "Si" ? 'checked' : '' }} required>
                                            <label class="form-check-label" for="mano_si">Sí</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="rn_posicion_mano" id="mano_no"
                                                value="No" {{ old('rn_posicion_mano') == "No" ? 'checked' : '' }} required>
                                            <label class="form-check-label" for="mano_no">No</label>
                                            <div class="invalid-feedback">
                                                Por favor, seleccione una opción.
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--7. ¿Lloraba o se sobresaltaba ante ruidos o movimientos muy fuertes?-->
                                <div class="col-md-12 mb-3">
                                    <label for="" class="form-label">
                                        7. ¿Lloraba o se sobresaltaba ante ruidos o movimientos muy fuertes?
                                    </label>
                                    <div class="d-flex justify-content-center">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="rn_llorar_movimientos" id="llorar_mov_si"
                                                value="Si" {{ old('rn_llorar_movimientos') == "Si" ? 'checked' : '' }} required>
                                            <label class="form-check-label" for="llorar_mov_si">Sí</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="rn_llorar_movimientos" id="llorar_mov_no"
                                                value="No" {{ old('rn_llorar_movimientos') == "No" ? 'checked' : '' }} required>
                                            <label class="form-check-label" for="llorar_mov_no">No</label>
                                            <div class="invalid-feedback">
                                                Por favor, seleccione una opción.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--Primera Infancia-->
            <div class="row my-3">
                <div class="card-group">
                    <div class="card">
                        <div class="card-header text-center bg-secondary text-white fw-bold h5">Primera Infancia</div>
                        <div class="card-body">
                            <div class="row">
                                <!--1. A que edad sostuvo la cabeza por si mismo -->
                                <div class="col-md-3 mb-3">
                                    <label for="edad_cabeza" class="form-label">
                                        1. A que edad sostuvo la cabeza por si mismo
                                    </label>
                                    <input
                                        type="number"
                                        class="form-control"
                                        id="edad_cabeza"
                                        name="pi_edad_sost_cabeza"
                                        min="0"
                                        value="{{ old('pi_edad_sost_cabeza') }}"
                                        placeholder="Digite la edad en meses"
                                        required
                                    />
                                    <div class="invalid-feedback">
                                        Por favor, digite la edad.
                                    </div>
                                </div>

                                <!--2. A qué edad se sentó-->
                                <div class="col-md-3 mb-3">
                                    <label for="edad_sentarse" class="form-label">
                                        2. A qué edad se sentó
                                    </label>
                                    <input type="number"
                                        class="form-control"
                                        id="edad_sentarse"
                                        name="pi_edad_sentarse"
                                        min="0"
                                        value="{{ old('pi_edad_sentarse') }}"
                                        placeholder="Digite la edad en meses"
                                        required
                                    />
                                    <div class="invalid-feedback">
                                        Por favor, digite la edad.
                                    </div>
                                </div>

                                <!--3. A qué edad empezó a gatear-->
                                <div class="col-md-3 mb-3">
                                    <label for="edad_gateo" class="form-label">
                                        3. A qué edad empezó a gatear
                                    </label>
                                    <input type="number" class="form-control" id="edad_gateo" name="pi_edad_gateo" min="0" value="{{ old('pi_edad_gateo') }}"
                                         placeholder="Digite la edad en meses" required />
                                    <div class="invalid-feedback">
                                        Por favor, digite la edad.
                                    </div>
                                </div>

                                <!--4. A qué edad empezó a caminar -->
                                <div class="col-md-3 mb-3">
                                    <label for="edad_caminar" class="form-label">
                                        4. A qué edad empezó a caminar
                                    </label>
                                    <input type="number" class="form-control" id="edad_caminar" name="pi_edad_caminar" min="0" value="{{ old('pi_edad_caminar') }}"
                                         placeholder="Digite la edad en meses" required />
                                    <div class="invalid-feedback">
                                        Por favor, digite la edad.
                                    </div>
                                </div>

                                <!--5.	A que edad dijo sus primeras palabras -->
                                <div class="col-md-3 mb-3">
                                    <label for="edad_palabras" class="form-label">
                                        5. A que edad dijo sus primeras palabras
                                    </label>
                                    <input type="number" class="form-control" id="edad_palabras" min="0" value="{{ old('pi_edad_primeras_palabras') }}"
                                        name="pi_edad_primeras_palabras" placeholder="Digite la edad en meses" required />
                                    <div class="invalid-feedback">
                                        Por favor, digite la edad.
                                    </div>
                                </div>

                                <!--6.	A qué edad dijo sus primeras frases -->
                                <div class="col-md-3 mb-3">
                                    <label for="edad_frases" class="form-label">
                                        6. A qué edad dijo sus primeras frases
                                    </label>
                                    <input type="number" class="form-control" id="edad_frases" min="0" value="{{ old('pi_edad_primeras_frases') }}"
                                        name="pi_edad_primeras_frases" placeholder="Digite la edad en meses" required />
                                    <div class="invalid-feedback">
                                        Por favor, digite la edad.
                                    </div>
                                </div>

                                <!--7.	¿Hasta qué edad lactó? -->
                                <div class="col-md-2 mb-3">
                                    <label for="edad_lactacion" class="form-label">
                                        7. ¿Hasta qué edad lactó?
                                    </label>
                                    <input type="number" class="form-control" id="edad_lactacion" min="0" name="pi_edad_lactacion" value="{{ old('pi_edad_lactacion')  }}" placeholder="Edad en meses" required />
                                    <div class="invalid-feedback">
                                        Por favor, digite la edad.
                                    </div>
                                </div>

                                <!--8.	Tuvo golpes fuertes en la cabeza y después del mismo vomitó o sangró-->
                                <div class="col-md-4 mb-3">
                                    <label for="" class="form-label">
                                        8. Tuvo golpes fuertes en la cabeza y después del mismo vomitó o sangró
                                    </label>
                                    <div class="d-flex justify-content-center">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="pi_lesiones" id="lesiones_si"
                                                value="Si" {{ old('pi_lesiones') == "Si" ? 'checked' : '' }} required>
                                            <label class="form-check-label" for="lesiones_si">Sí</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="pi_lesiones" id="lesiones_no"
                                                value="No" {{ old('pi_lesiones') == "No" ? 'checked' : '' }} required>
                                            <label class="form-check-label" for="lesiones_no">No</label>
                                            <div class="invalid-feedback">
                                                Por favor, seleccione una opción.
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--9. Tuvo enfermedades graves durante el primer año de vida -->
                                <div class="col-md-4 mb-3">
                                    <label for="" class="form-label">
                                        9. Tuvo enfermedades graves durante el primer año de vida
                                    </label>
                                    <div class="d-flex justify-content-center">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="pi_enfermedades" id="enfermedades_si"
                                                value="Si" {{ old('pi_enfermedades') == "Si" ? 'checked' : '' }} required>
                                            <label class="form-check-label" for="enfermedades_si">Sí</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="pi_enfermedades" id="enfermedades_no"
                                                value="No" {{ old('pi_enfermedades') == "No" ? 'checked' : '' }} required>
                                            <label class="form-check-label" for="enfermedades_no">No</label>
                                            <div class="invalid-feedback">
                                                Por favor, seleccione una opción.
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--10.	Tuvo alguna vez temperatura alta durante la cual sufrió ataques y delirios-->
                                <div class="col-md-4 mb-3">
                                    <label for="" class="form-label">
                                        10. Tuvo alguna vez temperatura alta durante la cual sufrió ataques y delirios
                                    </label>
                                    <div class="d-flex justify-content-center">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="pi_temperatura" id="temperatura_si"
                                                value="Si" {{ old('pi_temperatura') == "Si" ? 'checked' : '' }} required>
                                            <label class="form-check-label" for="temperatura_si">Sí</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="pi_temperatura" id="temperatura_no"
                                                value="No" {{ old('pi_temperatura') == "No" ? 'checked' : '' }} required>
                                            <label class="form-check-label" for="temperatura_no">No</label>
                                            <div class="invalid-feedback">
                                                Por favor, seleccione una opción.
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--11.	¿Su niño fue sometido a una operación quirúrgica?-->
                                <div class="col-md-4 mb-3">
                                    <label for="" class="form-label">
                                        11. ¿Su niño fue sometido a una operación quirúrgica?
                                    </label>
                                    <div class="d-flex justify-content-around">
                                        <div>
                                            <input
                                                type="text"
                                                class="form-control"
                                                name="pi_operacion_quirurgica"
                                                value="{{ old('pi_operacion_quirurgica') }}"
                                                placeholder="Sí, a qué edad, de qué"
                                            >
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input
                                                class="form-check-input"
                                                type="checkbox"
                                                name="pi_operacion_quirurgica"
                                                id="operacion_no"
                                                value="No" {{ old('pi_operacion_quirurgica') == "No" ? 'checked' : '' }}
                                                >
                                            <label class="form-check-label" for="operacion_no">No</label>
                                            <div class="invalid-feedback">
                                                Por favor, seleccione una opción.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--Desarrollo Actual-->
            <div class="row mb-3">
                <div class="card-group">
                    <div class="card">
                        <div class="card-header text-center bg-secondary text-white fw-bold h5">Desarrollo Actual</div>
                        <div class="card-body">
                            <div class="row">
                                <!--1. ¿Tiene alguna enfermedad?-->
                                <div class="col-md-4 mb-3">
                                    <label for="" class="form-label">
                                        1. ¿Tiene alguna enfermedad?
                                    </label>
                                    <div class="d-flex justify-content-around">
                                        <div>
                                            <input
                                                type="text"
                                                class="form-control"
                                                name="da_enfermedad"
                                                value="{{ old('da_enfermedad') }}"
                                                placeholder="Sí, cuál..."
                                            >
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input
                                                class="form-check-input"
                                                type="checkbox"
                                                name="da_enfermedad"
                                                id="enfermedad_da_no"
                                                value="No" {{ old('da_enfermedad') == "No" ? 'checked' : '' }}
                                            />
                                            <label class="form-check-label" for="enfermedad_da_no">No</label>
                                        </div>
                                        <div class="invalid-feedback">
                                            Por favor, responda esta pregunta.
                                        </div>
                                    </div>
                                </div>

                                <!--2. ¿Tiene problemas al hablar?-->
                                <div class="col-md-4">
                                    <label for="problema_hablar" class="form-label">
                                        2. ¿Tiene problemas al hablar?
                                    </label>
                                    <div class="form-check">
                                        <input
                                            type="checkbox"
                                            class="form-check-input"
                                            name="da_problemas_hablar[]"
                                            value="Tartamudea" {{ (is_array(old('da_problemas_hablar')) && in_array('Tartamudea', old('da_problemas_hablar'))) ? ' checked' : '' }}
                                            id="tartamudea"
                                        >
                                        <label class="form-check-label" for="tartamudea">
                                            Tartamudea
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input
                                            class="form-check-input"
                                            name="da_problemas_hablar[]"
                                            type="checkbox"
                                            value="No pronuncia bien algún sonido" {{ (is_array(old('da_problemas_hablar')) && in_array('No pronuncia bien algún sonido', old('da_problemas_hablar'))) ? ' checked' : '' }}
                                            id="no_pronuncia"
                                        >
                                        <label class="form-check-label" for="no_pronuncia">
                                            No pronuncia bien algún sonido
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input
                                            class="form-check-input"
                                            type="checkbox"
                                            name="da_problemas_hablar[]"
                                            value="Habla poco" {{ (is_array(old('da_problemas_hablar')) && in_array('Habla poco', old('da_problemas_hablar'))) ? ' checked' : '' }}
                                            id="habla_poco"
                                        >
                                        <label class="form-check-label" for="habla_poco">
                                            Habla poco
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input
                                            class="form-check-input"
                                            type="checkbox"
                                            name="da_problemas_hablar[]"
                                            value="Habla como bebé" {{ (is_array(old('da_problemas_hablar')) && in_array('Habla como bebé', old('da_problemas_hablar'))) ? ' checked' : '' }}
                                            id="como_bebe"
                                        >
                                        <label class="form-check-label" for="como_bebe">
                                            Habla como bebé
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input
                                            class="form-check-input"
                                            type="checkbox"
                                            name="da_problemas_hablar[]"
                                            value="Normal" {{ (is_array(old('da_problemas_hablar')) && in_array('Normal', old('da_problemas_hablar'))) ? ' checked' : '' }}
                                            id="hablar_normal"
                                        >
                                        <label class="form-check-label" for="hablar_normal">
                                            Normal
                                        </label>
                                    </div>
                                </div>

                                <!--3. Lateralidad-->
                                <div class="col-md-3 mb-3">
                                    <label for="" class="form-label">
                                        3. Lateralidad
                                    </label>
                                    <div class="d-flex justify-content-between">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="da_lateralidad" id="zurdo"
                                                value="Zurdo" {{ old('da_lateralidad') == "Zurdo" ? 'checked' : '' }} required>
                                            <label class="form-check-label" for="zurdo">Zurdo</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="da_lateralidad" id="derecho"
                                                value="Derecho" {{ old('da_lateralidad') == "Derecho" ? 'checked' : '' }} required>
                                            <label class="form-check-label" for="derecho">Derecho</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="da_lateralidad" id="ambos"
                                                value="Ambos" {{ old('da_lateralidad') == "Ambos" ? 'checked' : '' }} required>
                                            <label class="form-check-label" for="ambos">Ambos</label>
                                            <div class="invalid-feedback">
                                                Por favor, seleccione una opción.
                                            </div>
                                        </div>
        
                                    </div>
                                </div>
                            </div>

                            <div class="row my-2">

                                <!--4. Se moja u orina en la casa-->
                                <div class="col-md-4 mb-3">
                                    <label for="" class="form-label">
                                        4. Se moja u orina en la casa
                                    </label>
                                    <div class="d-flex justify-content-around">
                                        <div>
                                            <input
                                                type="text"
                                                class="form-control"
                                                name="da_moja_orina"
                                                value="{{ old('da_moja_orina') }}"
                                                placeholder="Sí, cuántas veces a la semana"
                                            >
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input
                                                class="form-check-input"
                                                type="checkbox"
                                                name="da_moja_orina"
                                                id="moja_no"
                                                value="No" {{ old('da_moja_orina') == "No" ? 'checked' : '' }}
                                            />
                                            <label class="form-check-label" for="moja_no">No</label>
                                        </div>
                                        <div class="invalid-feedback">
                                            Por favor, seleccione una opción.
                                        </div>
                                    </div>
                                </div>

                                <!--5. ¿Tiene miedo a algo o a alguien?-->
                                <div class="col-md-4 mb-3">
                                    <label for="" class="form-label">
                                        5. ¿Tiene miedo a algo o a alguien?
                                    </label>
                                    <div class="d-flex justify-content-around">
                                        <div>
                                            <input
                                                type="text"
                                                class="form-control"
                                                name="da_miedo"
                                                placeholder="Sí, a qué..."
                                                value="{{ old('da_miedo') }}"
                                            >
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input
                                                class="form-check-input"
                                                type="checkbox"
                                                name="da_miedo"
                                                id="miedo_no"
                                                value="No" {{ old('da_miedo') == "No" ? 'checked' : '' }}
                                            />
                                            <label class="form-check-label" for="miedo_no">No</label>
                                            <div class="invalid-feedback">
                                                Por favor, seleccione una opción.
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--6. La disciplina en la casa es:-->
                                <div class="col-md-4 mb-3">
                                    <label for="" class="form-label">
                                        6. La disciplina en la casa es:
                                    </label>
                                    <div class="d-flex justify-content-around flex-column">
                                        <div class="form-check form-check-inline">
                                            <input
                                                class="form-check-input"
                                                type="checkbox"
                                                name="da_disciplina"
                                                id="rebelde"
                                                value="Rebelde Agresivo" {{ old('da_disciplina') == "Rebelde Agresivo" ? 'checked' : '' }}
                                            >
                                            <label class="form-check-label" for="rebelde">Rebelde Agresivo</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input
                                                class="form-check-input"
                                                type="checkbox"
                                                name="da_disciplina"
                                                id="dificil_tratar"
                                                value="Difícil de tratar" {{ old('da_disciplina') == "Difícil de tratar" ? 'checked' : '' }}
                                            >
                                            <label class="form-check-label" for="dificil_tratar">Difícil de tratar</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input
                                                class="form-check-input"
                                                type="checkbox"
                                                name="da_disciplina"
                                                id="obediente"
                                                value="Obediente y sereno" {{ old('da_disciplina') == "Obediente y sereno" ? 'checked' : '' }}
                                            >
                                            <label class="form-check-label" for="obediente">Obediente y sereno</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input
                                                class="form-check-input"
                                                type="checkbox"
                                                name="da_disciplina"
                                                id="colaborador"
                                                value="Colaborador activo" {{ old('da_disciplina') == "Colaborador activo" ? 'checked' : '' }}
                                            >
                                            <label class="form-check-label" for="colaborador">Colaborador activo</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input
                                                class="form-check-input"
                                                type="checkbox"
                                                name="da_disciplina"
                                                id="sumiso"
                                                value="Sumiso dependiente" {{ old('da_disciplina') == "Sumiso dependiente" ? 'checked' : '' }}
                                            >
                                            <label class="form-check-label" for="sumiso">Sumiso dependiente</label>
                                        </div>
                                        <div>
                                            <input
                                                type="text"
                                                class="form-control"
                                                name="da_disciplina"
                                                value="{{ old('da_disciplina') }}"
                                                placeholder="Otro..."
                                            >
                                        </div>
                                        <div class="invalid-feedback">
                                            Por favor, responda esta pregunta.
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <!--7. Relación con los hermanos -->
                                <div class="col-md-4 mb-3">
                                    <label for="" class="form-label">
                                        7. Relación con los hermanos
                                    </label>
                                    <div class="d-flex justify-content-around flex-column">
                                        <div class="form-check form-check-inline">
                                            <input
                                                class="form-check-input"
                                                type="radio"
                                                name="da_relacion_hermanos"
                                                id="rechazo"
                                                value="Rechazo" {{ old('da_relacion_hermanos') == "Rechazo" ? 'checked' : '' }}
                                                required
                                            >
                                            <label class="form-check-label" for="rechazo">Rechazo</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input
                                                class="form-check-input"
                                                type="radio"
                                                name="da_relacion_hermanos"
                                                id="rel_dificil"
                                                value="Relaciones difíciles y discusiones" {{ old('da_relacion_hermanos') == "Relaciones difíciles y discusiones" ? 'checked' : '' }}
                                                required
                                            >
                                            <label class="form-check-label" for="rel_dificil">Relaciones difíciles y discusiones</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input
                                                class="form-check-input"
                                                type="radio"
                                                name="da_relacion_hermanos"
                                                id="rel_bien"
                                                value="Bien aceptado" {{ old('da_relacion_hermanos') == "Bien aceptado" ? 'checked' : '' }}
                                                required
                                            >
                                            <label class="form-check-label" for="rel_bien">Bien aceptado</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input
                                                class="form-check-input"
                                                type="radio"
                                                name="da_relacion_hermanos"
                                                id="rel_colaborador"
                                                value="Colaborador y generoso" {{ old('da_relacion_hermanos') == "Colaborador y generoso" ? 'checked' : '' }}
                                                required
                                            >
                                            <label class="form-check-label" for="rel_colaborador">Colaborador y generoso</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input
                                                class="form-check-input"
                                                type="radio"
                                                name="da_relacion_hermanos"
                                                id="rel_dependencia"
                                                value="Dependencia excesiva" {{ old('da_relacion_hermanos') == "Dependencia excesiva" ? 'checked' : '' }}
                                                required
                                            >
                                            <label class="form-check-label" for="rel_dependencia">Dependencia excesiva</label>
                                            <div class="invalid-feedback">
                                                Por favor, seleccione una opción.
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--8.	Responsabilidad en el hogar -->
                                <div class="col-md-4 mb-3">
                                    <label for="" class="form-label">
                                        8. Responsabilidad en el hogar
                                    </label>
                                    <div class="d-flex justify-content-around flex-column">
                                        <div class="form-check form-check-inline">
                                            <input
                                                class="form-check-input"
                                                type="radio"
                                                name="da_responsabilidad_hogar"
                                                id="resp_no"
                                                value="No cumple sus responsabilidades" {{ old('da_responsabilidad_hogar') == "No cumple sus responsabilidades" ? 'checked' : '' }}
                                                required
                                            >
                                            <label class="form-check-label" for="resp_no">No cumple sus responsabilidades</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input
                                                class="form-check-input"
                                                type="radio"
                                                name="da_responsabilidad_hogar"
                                                id="resp_regular"
                                                value="Regular" {{ old('da_responsabilidad_hogar') == "Regular" ? 'checked' : '' }}
                                                required
                                            >
                                            <label class="form-check-label" for="resp_regular">Regular</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input
                                                class="form-check-input"
                                                type="radio"
                                                name="da_responsabilidad_hogar"
                                                id="resp_normal"
                                                value="Normal" {{ old('da_responsabilidad_hogar') == "Normal" ? 'checked' : '' }}
                                                required
                                            >
                                            <label class="form-check-label" for="resp_normal">Normal</label>
                                            <div class="invalid-feedback">
                                                Por favor, seleccione una opción.
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--9.	Motivación de su hijo -->
                                <div class="col-md-4 mb-3">
                                    <label for="" class="form-label">
                                        9. Motivación de su hijo
                                    </label>
                                    <div class="d-flex justify-content-around flex-column">
                                        <div class="form-check form-check-inline">
                                            <input
                                                class="form-check-input"
                                                type="radio"
                                                name="da_motivacion_hijo"
                                                id="flojo"
                                                value="Flojo y pasivo" {{ old('da_motivacion_hijo') == "Flojo y pasivo" ? 'checked' : '' }}
                                                required
                                            >
                                            <label class="form-check-label" for="flojo">Flojo y pasivo</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input
                                                class="form-check-input"
                                                type="radio"
                                                name="da_motivacion_hijo"
                                                id="obligado"
                                                value="Hay que obligarlo" {{ old('da_motivacion_hijo') == "Hay que obligarlo" ? 'checked' : '' }}
                                                required
                                            >
                                            <label class="form-check-label" for="obligado">Hay que obligarlo</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input
                                                class="form-check-input"
                                                type="radio"
                                                name="da_motivacion_hijo"
                                                id="con_empleo"
                                                value="Estudia y trabaja con empleo" {{ old('da_motivacion_hijo') == "Estudia y trabaja con empleo" ? 'checked' : '' }}
                                                required
                                            >
                                            <label class="form-check-label" for="con_empleo">Estudia y trabaja con empleo</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input
                                                class="form-check-input"
                                                type="radio"
                                                name="da_motivacion_hijo"
                                                id="con_interes"
                                                value="Hace las cosas con mucho interés" {{ old('da_motivacion_hijo') == "Hace las cosas con mucho interés" ? 'checked' : '' }}
                                                required
                                            >
                                            <label class="form-check-label" for="con_interes">Hace las cosas con mucho interés</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input
                                                class="form-check-input"
                                                type="radio"
                                                name="da_motivacion_hijo"
                                                id="entusiasmo"
                                                value="Hace por sí mismo con entusiasmo" {{ old('da_motivacion_hijo') == "Hace por sí mismo con entusiasmo" ? 'checked' : '' }}
                                                required
                                            >
                                            <label class="form-check-label" for="entusiasmo">Hace por sí mismo con entusiasmo</label>
                                            <div class="invalid-feedback">
                                                Por favor, seleccione una opción.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--10.	Marque las conductas que se apliquen a su hijo -->
                            <div class="col-md-11">
                                <label for="problema_hablar" class="form-label">
                                    10.	Marque las conductas que se apliquen a su hijo
                                </label>
                                <div class="d-md-flex flex-fill flex-wrap justify-content-evenly">
                                    <div class="form-check">
                                        <input
                                            class="form-check-input"
                                            type="checkbox"
                                            name="da_conductas_hijo[]"
                                            value="Comer demás" {{ (is_array(old('da_conductas_hijo')) && in_array('Comer demás', old('da_conductas_hijo'))) ? ' checked' : '' }}
                                            id="comer_demas"
                                        >
                                        <label class="form-check-label" for="comer_demas">
                                            Comer demás
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input"
                                            type="checkbox"
                                            name="da_conductas_hijo[]"
                                            value="Drogarse" {{ (is_array(old('da_conductas_hijo')) && in_array('Drogarse', old('da_conductas_hijo'))) ? ' checked' : '' }}
                                            id="drogarse"
                                        >
                                        <label class="form-check-label" for="drogarse">
                                            Drogarse
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input
                                            class="form-check-input"
                                            type="checkbox"
                                            name="da_conductas_hijo[]"
                                            value="Descontrol emocional" {{ (is_array(old('da_conductas_hijo')) && in_array('Descontrol emocional', old('da_conductas_hijo'))) ? ' checked' : '' }}
                                            id="descontrol_emocional"
                                        >
                                        <label class="form-check-label" for="descontrol_emocional">
                                            Descontrol emocional
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input
                                            class="form-check-input"
                                            type="checkbox"
                                            name="da_conductas_hijo[]"
                                            value="Ser flojo" {{ (is_array(old('da_conductas_hijo')) && in_array('Ser flojo', old('da_conductas_hijo'))) ? ' checked' : '' }}
                                            id="ser_flojo"
                                        >
                                        <label class="form-check-label" for="ser_flojo">
                                            Ser flojo
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input
                                            class="form-check-input"
                                            type="checkbox"
                                            name="da_conductas_hijo[]"
                                            value="Aislarse" {{ (is_array(old('da_conductas_hijo')) && in_array('Aislarse', old('da_conductas_hijo'))) ? ' checked' : '' }}
                                            id="aislarse"
                                        >
                                        <label class="form-check-label" for="aislarse">
                                            Aislarse
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input
                                            class="form-check-input"
                                            type="checkbox"
                                            name="da_conductas_hijo[]"
                                            value="Problemas para comer" {{ (is_array(old('da_conductas_hijo')) && in_array('Problemas para comer', old('da_conductas_hijo'))) ? ' checked' : '' }}
                                            id="problemas_comer"
                                        >
                                        <label class="form-check-label" for="problemas_comer">
                                            Problemas para comer
                                        </label>
                                    </div>
                                </div>
                                <div class="d-md-flex flex-fill flex-wrap justify-content-evenly my-md-2">
                                    <div class="form-check">
                                        <input
                                            class="form-check-input"
                                            type="checkbox"
                                            name="da_conductas_hijo[]"
                                            value="Vómitos" {{ (is_array(old('da_conductas_hijo')) && in_array('Vómitos', old('da_conductas_hijo'))) ? ' checked' : '' }}
                                            id="vomitos"
                                        >
                                        <label class="form-check-label" for="vomitos">
                                            Vómitos
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input
                                            class="form-check-input"
                                            type="checkbox"
                                            name="da_conductas_hijo[]"
                                            value="Impulsivo" {{ (is_array(old('da_conductas_hijo')) && in_array('Impulsivo', old('da_conductas_hijo'))) ? ' checked' : '' }}
                                            id="impulsivo"
                                        >
                                        <label class="form-check-label" for="impulsivo">
                                            Impulsivo
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input
                                            class="form-check-input"
                                            type="checkbox"
                                            name="da_conductas_hijo[]"
                                            value="Problemas para dormir" {{ (is_array(old('da_conductas_hijo')) && in_array('Problemas para dormir', old('da_conductas_hijo'))) ? ' checked' : '' }}
                                            id="problemas_dormir"
                                        >
                                        <label class="form-check-label" for="problemas_dormir">
                                            Problemas para dormir
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input
                                            class="form-check-input"
                                            type="checkbox"
                                            name="da_conductas_hijo[]"
                                            value="Gritar" {{ (is_array(old('da_conductas_hijo')) && in_array('Gritar', old('da_conductas_hijo'))) ? ' checked' : '' }}
                                            id="gritar"
                                        >
                                        <label class="form-check-label" for="gritar">
                                            Gritar
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input
                                            class="form-check-input"
                                            type="checkbox"
                                            name="da_conductas_hijo[]"
                                            value="Agresivo" {{ (is_array(old('da_conductas_hijo')) && in_array('Agresivo', old('da_conductas_hijo'))) ? ' checked' : '' }}
                                            id="agresivo"
                                        >
                                        <label class="form-check-label" for="agresivo">
                                            Agresivo
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input
                                            class="form-check-input"
                                            type="checkbox"
                                            name="da_conductas_hijo[]"
                                            value="No terminar tareas" {{ (is_array(old('da_conductas_hijo')) && in_array('No terminar tareas', old('da_conductas_hijo'))) ? ' checked' : '' }}
                                            id="no_terminar_tareas"
                                        >
                                        <label class="form-check-label" for="no_terminar_tareas">
                                            No terminar tareas
                                        </label>
                                    </div>
                                    {{--  <div class="form-check">
                                        <input
                                            class="form-check-input"
                                            type="checkbox"
                                            name="da_conductas_hijo[]"
                                            value="Otro"
                                            id="otro_conducta"
                                        >
                                        <label class="form-check-label" for="otro_conducta">
                                            Otro
                                        </label>
                                    </div>  --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="card-group">
                    <!--Actitud de la Familia hacia el niño(a)-->
                    <div class="card">
                        <div class="card-header text-center bg-secondary text-white fw-bold h5">Actitud de la Familia hacia el niño(a)</div>
                        <div class="card-body">
                            <div class="row">
                                <!--1. Como padres lo respetan, lo quieren, lo protegen, mas o menos al hijo que al resto de sus hermanos -->
                                <div class="col-md-12 mb-3">
                                    <label for="" class="form-label">
                                        1. Como padres lo respetan, lo quieren, lo protegen, mas o menos al hijo que al resto de sus hermanos
                                    </label>
                                    <div class="d-flex justify-content-around flex-row">
                                        <div class="form-check form-check-inline">
                                            <input
                                                class="form-check-input"
                                                type="radio"
                                                name="acf_respeto"
                                                id="acf_mas"
                                                value="Más" {{ old('acf_respeto') == "Más" ? 'checked' : '' }}
                                                required
                                            >
                                            <label class="form-check-label" for="acf_mas">Más</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input
                                                class="form-check-input"
                                                type="radio"
                                                name="acf_respeto"
                                                id="acf_igual"
                                                value="Igual" {{ old('acf_respeto') == "Igual" ? 'checked' : '' }}
                                                required
                                            >
                                            <label class="form-check-label" for="acf_igual">Igual</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input
                                                class="form-check-input"
                                                type="radio"
                                                name="acf_respeto"
                                                id="acf_menos"
                                                value="Menos" {{ old('acf_respeto') == "Menos" ? 'checked' : '' }}
                                                required
                                            >
                                            <label class="form-check-label" for="acf_menos">Menos</label>
                                            <div class="invalid-feedback">
                                                Por favor, seleccione una opción.
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--2.	Que piensan y sienten los hermanos del niño-->
                                <div class="col-md-12 mb-3">
                                    <label for="emociones_hermano" class="form-label">
                                        2.	Qué piensan y sienten los hermanos del niño
                                    </label>
                                    <textarea
                                        class="form-control"
                                        name="acf_emociones_hermano"
                                        id="emociones_hermano"
                                        rows="3"
                                        placeholder="Describa por favor..."
                                        required
                                    >{{ old('acf_emociones_hermano') }}</textarea>
                                    <div class="invalid-feedback">
                                        Por favor, describa algo.
                                    </div>
                                </div>

                                <!--3. Cómo le gusta o exige que se le trate-->
                                <div class="col-md-12 mb-3">
                                    <label for="gusto" class="form-label">
                                        3. Cómo le gusta o exige que se le trate
                                    </label>
                                    <textarea
                                        class="form-control"
                                        name="acf_gusto_trato"
                                        id="gusto"
                                        rows="4"
                                        placeholder="Describa por favor..."
                                        required
                                    >{{ old('acf_gusto_trato') }}</textarea>
                                    <div class="invalid-feedback">
                                        Por favor, describa algo.
                                    </div>
                                </div>

                                <!--4. Cómo califica el comportamiento de su hijo -->
                                <div class="col-md-12 mb-3">
                                    <label for="" class="form-label">
                                        4. Cómo califica el comportamiento de su hijo
                                    </label>
                                    <div class="d-md-flex justify-content-around flex-row">
                                        <div class="form-check form-check-inline">
                                            <input
                                                class="form-check-input"
                                                type="radio"
                                                name="acf_comportamiento_hijo"
                                                id="excelente"
                                                value="Excelente" {{ old('acf_comportamiento_hijo') == "Excelente" ? 'checked' : '' }}
                                                required
                                            >
                                            <label class="form-check-label" for="excelente">Excelente</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input
                                                class="form-check-input"
                                                type="radio"
                                                name="acf_comportamiento_hijo"
                                                id="deficiente"
                                                value="Deficiente" {{ old('acf_comportamiento_hijo') == "Deficiente" ? 'checked' : '' }}
                                                required
                                            >
                                            <label class="form-check-label" for="deficiente">Deficiente</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input
                                                class="form-check-input"
                                                type="radio"
                                                name="acf_comportamiento_hijo"
                                                id="comp_bueno"
                                                value="Bueno" {{ old('acf_comportamiento_hijo') == "Bueno" ? 'checked' : '' }}
                                                required
                                            >
                                            <label class="form-check-label" for="comp_bueno">Bueno</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input
                                                class="form-check-input"
                                                type="radio"
                                                name="acf_comportamiento_hijo"
                                                id="pesimo"
                                                value="Pésimo" {{ old('acf_comportamiento_hijo') == "Pésimo" ? 'checked' : '' }}
                                                required
                                            >
                                            <label class="form-check-label" for="pesimo">Pésimo</label>
                                            <div class="invalid-feedback">
                                                Por favor, seleccione una opción.
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--5. A parte de estudiar ¿Qué cosas le interesa o le gusta hacer?-->
                                <div class="col-md-12 mb-3">
                                    <label for="intereses_hijo" class="form-label">
                                        5. A parte de estudiar ¿Qué cosas le interesa o le gusta hacer?
                                    </label>
                                    <textarea
                                        class="form-control"
                                        name="acf_intereses_hijo"
                                        id="intereses_hijo"
                                        rows="4"
                                        placeholder="Describa por favor..."
                                        required
                                    >{{ old('acf_intereses_hijo') }}</textarea>
                                    <div class="invalid-feedback">
                                        Por favor, describa algo.
                                    </div>
                                </div>

                                <!--6. ¿Qué profesión quisiera que su hijo tenga?-->
                                <div class="col-md-12 mb-3">
                                    <label for="profesion_hijo" class="form-label">
                                        6. ¿Qué profesión quisiera que su hijo tenga?
                                    </label>
                                    <textarea
                                        class="form-control"
                                        name="acf_profesion_hijo"
                                        id="profesion_hijo"
                                        rows="1"
                                        placeholder="Especifique la profesión"
                                        required
                                    >{{ old('acf_profesion_hijo') }}</textarea>
                                    <div class="invalid-feedback">
                                        Por favor, describa algo.
                                    </div>
                                </div>

                                <!--7. ¿Su hijo tiene algún problema que a usted le preocupa?-->
                                <div class="col-md-12 mb-3">
                                    <label for="prob_preo_hijo" class="form-label">
                                        7. ¿Su hijo tiene algún problema que a usted le preocupa?
                                    </label>
                                    <textarea
                                        class="form-control"
                                        name="acf_problemas_preocupantes_hijo"
                                        id="prob_preo_hijo"
                                        rows="3"
                                        placeholder="En caso de haber algún problema, describa por favor..."
                                        required
                                    >{{ old('acf_problemas_preocupantes_hijo') }}</textarea>
                                    <div class="invalid-feedback">
                                        Por favor, describa algo.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--ESTRUCTURA FAMILIAR-->
                    <div class="card">
                        <div class="card-header text-center bg-secondary text-white fw-bold h5">Estructura Familiar</div>
                        <div class="card-body">
                            <div class="row">
                                <!--1. Los padres están -->
                                <div class="col-md-12 mb-3">
                                    <label for="" class="form-label">
                                        1. Los padres están:
                                    </label>
                                    <div class="d-md-flex justify-content-around flex-row">
                                        <div class="form-check form-check-inline">
                                            <input
                                                class="form-check-input"
                                                type="radio"
                                                name="ef_estado_civil"
                                                id="casados"
                                                value="Casados" {{ old('ef_estado_civil') == "Casados" ? 'checked' : '' }}
                                                required
                                            >
                                            <label class="form-check-label" for="casados">Casados</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input
                                                class="form-check-input"
                                                type="radio"
                                                name="ef_estado_civil"
                                                id="concubinos"
                                                value="Concubinos" {{ old('ef_estado_civil') == "Concubinos" ? 'checked' : '' }}
                                                required
                                            >
                                            <label class="form-check-label" for="concubinos">Concubinos</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input
                                                class="form-check-input"
                                                type="radio"
                                                name="ef_estado_civil"
                                                id="separados"
                                                value="Separados" {{ old('ef_estado_civil') == "Separados" ? 'checked' : '' }}
                                                required
                                            >
                                            <label class="form-check-label" for="separados">Separados</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input
                                                class="form-check-input"
                                                type="radio"
                                                name="ef_estado_civil"
                                                id="divorciados"
                                                value="Divorciados" {{ old('ef_estado_civil') == "Divorciados" ? 'checked' : '' }}
                                                required
                                            >
                                            <label class="form-check-label" for="divorciados">Divorciados</label>
                                            <div class="invalid-feedback">
                                                Por favor, seleccione una opción.
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--2. Hace qué tiempo-->
                                <div class="col-md-12 mb-3">
                                    <label for="tiempo" class="form-label">
                                        2. ¿Hace qué tiempo?
                                    </label>
                                    <textarea
                                        class="form-control"
                                        name="ef_tiempo"
                                        id="tiempo"
                                        rows="1"
                                        placeholder="Puede describir si es necesario"
                                        required
                                    >{{ old('ef_tiempo') }}</textarea>
                                    <div class="invalid-feedback">
                                        Por favor, describa algo.
                                    </div>
                                </div>

                                <!--3. Causa-->
                                <div class="col-md-12 mb-3">
                                    <label for="causa" class="form-label">
                                        3. ¿Por qué causa?
                                    </label>
                                    <textarea
                                        class="form-control"
                                        name="ef_causa"
                                        id="causa"
                                        rows="3"
                                        placeholder="Explique la causa, por favor..."
                                        required
                                    >{{ old('ef_causa') }}</textarea>
                                    <div class="invalid-feedback">
                                        Por favor, describa la causa.
                                    </div>
                                </div>

                                <!--4. El hijo vive con-->
                                <div class="col-md-12 mb-3">
                                    <label for="hijo_vive" class="form-label">
                                        4. El hijo vive con:
                                    </label>
                                    <textarea
                                        class="form-control"
                                        name="ef_hijo_vive"
                                        id="hijo_vive"
                                        rows="2"
                                        placeholder="Padre o Madre u otro (Nombre completo)"
                                        required
                                    >{{ old('ef_hijo_vive') }}</textarea>
                                    <div class="invalid-feedback">
                                        Por favor, especifíque con quién vive.
                                    </div>
                                </div>

                                <!--5. Alguno de los padres hizo abandono del hogar ¿quién?-->
                                <div class="col-md-12 mb-3">
                                    <label for="abandono" class="form-label">
                                        5. Alguno de los padres hizo abandono del hogar ¿quién?
                                    </label>
                                    <textarea
                                        class="form-control"
                                        name="ef_abandono_hogar"
                                        id="abandono"
                                        rows="3"
                                        placeholder="Especifíque quién, y el motivo si es necesario..."
                                        required
                                    >{{ old('ef_abandono_hogar') }}</textarea>
                                    <div class="invalid-feedback">
                                        Por favor, especifíque con quién vive.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="card-group">
                    <!--Ambiente Familiar-->
                    <div class="card">
                        <div class="card-header text-center bg-secondary text-white fw-bold h5">Ambiente Familiar</div>
                        <div class="card-body">
                            <div class="row">
                                <!--1. En la casa se vive un ambiente  -->
                                <div class="col-md-12 mb-3">
                                    <label for="" class="form-label">
                                        1. En la casa se vive un ambiente:
                                    </label>
                                    <div class="d-flex justify-content-around flex-column">
                                        <div class="form-check form-check-inline">
                                            <input
                                                class="form-check-input"
                                                type="radio"
                                                name="af_ambiente_casa"
                                                id="tranquilo"
                                                value="Casi siempre tranquilo" {{ old('af_ambiente_casa') == "Casi siempre tranquilo" ? 'checked' : '' }}
                                                required
                                            >
                                            <label class="form-check-label" for="tranquilo">Casi siempre tranquilo</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input
                                                class="form-check-input"
                                                type="radio"
                                                name="af_ambiente_casa"
                                                id="armonioso"
                                                value="Armonioso o agradable" {{ old('af_ambiente_casa') == "Armonioso o agradable" ? 'checked' : '' }}
                                                required
                                            >
                                            <label class="form-check-label" for="armonioso">Armonioso o agradable</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input
                                                class="form-check-input"
                                                type="radio"
                                                name="af_ambiente_casa"
                                                id="amornioso_discusiones"
                                                value="Recciones armoniosas y a veces con discusiones" {{ old('af_ambiente_casa') == "Recciones armoniosas y a veces con discusiones" ? 'checked' : '' }}
                                                required
                                            >
                                            <label class="form-check-label" for="amornioso_discusiones">Recciones armoniosas y a veces con discusiones</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input
                                                class="form-check-input"
                                                type="radio"
                                                name="af_ambiente_casa"
                                                id="peleas"
                                                value="Frecuentes discusiones y peleas desagradables" {{ old('af_ambiente_casa') == "Frecuentes discusiones y peleas desagradables" ? 'checked' : '' }}
                                                required
                                            >
                                            <label class="form-check-label" for="peleas">Frecuentes discusiones y peleas desagradables</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input
                                                class="form-check-input"
                                                type="radio"
                                                name="af_ambiente_casa"
                                                id="separaciones"
                                                value="Separaciones temporales o definitivas" {{ old('af_ambiente_casa') == "Separaciones temporales o definitivas" ? 'checked' : '' }}
                                                required
                                            >
                                            <label class="form-check-label" for="separaciones">Separaciones temporales o definitivas</label>
                                            <div class="invalid-feedback">
                                                Por favor, seleccione una opción.
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--2. A causa de qué se produce las discusiones y peleas en la familia-->
                                <div class="col-md-12 mb-3">
                                    <label for="causa_discuciones" class="form-label">
                                        2. A causa de qué se produce las discusiones y peleas en la familia
                                    </label>
                                    <textarea
                                        class="form-control"
                                        name="af_causa_discusiones"
                                        id="causa_discuciones"
                                        rows="4"
                                        placeholder="Describa detalladamente por favor..."
                                        required
                                    >{{ old('af_causa_discusiones') }}</textarea>
                                    <div class="invalid-feedback">
                                        Por favor, describa la causa.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--Actitudes Educativas en los Padres-->
                    <div class="card">
                        <div class="card-header text-center bg-secondary text-white fw-bold h5">Actitudes Educativas en los Padres</div>
                        <div class="card-body">
                            <div class="row">
                                <!--1. Autoridad -->
                                <div class="col-md-12 mb-3">
                                    <label for="" class="form-label">
                                        1. Autoridad
                                    </label>
                                    <div class="d-md-flex justify-content-around flex-row">
                                        <div class="form-check form-check-inline">
                                            <input
                                                class="form-check-input"
                                                type="radio"
                                                name="ace_autoridad"
                                                id="muy_fuerte"
                                                value="Muy fuerte" {{ old('ace_autoridad') == "Muy fuerte" ? 'checked' : '' }}
                                                required
                                            >
                                            <label class="form-check-label" for="muy_fuerte">Muy fuerte</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input
                                                class="form-check-input"
                                                type="radio"
                                                name="ace_autoridad"
                                                id="serena_equilibrada"
                                                value="Serena y Equilibrada" {{ old('ace_autoridad') == "Serena y Equilibrada" ? 'checked' : '' }}
                                                required
                                            >
                                            <label class="form-check-label" for="serena_equilibrada">Serena y Equilibrada</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input
                                                class="form-check-input"
                                                type="radio"
                                                name="ace_autoridad"
                                                id="muy_debil"
                                                value="Muy débil" {{ old('ace_autoridad') == "Muy débil" ? 'checked' : '' }}
                                                required
                                            >
                                            <label class="form-check-label" for="muy_debil">Muy débil</label>
                                            <div class="invalid-feedback">
                                                Por favor, seleccione una opción.
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--2. Protección -->
                                <div class="col-md-12 mb-3">
                                    <label for="" class="form-label">
                                        2. Protección
                                    </label>
                                    <div class="d-md-flex justify-content-center flex-column">
                                        <div class="form-check form-check-inline">
                                            <input
                                                class="form-check-input"
                                                type="radio"
                                                name="ace_proteccion"
                                                id="sobre_proteccion"
                                                value="Sobre Protección" {{ old('ace_proteccion') == "Sobre Protección" ? 'checked' : '' }}
                                                required
                                            >
                                            <label class="form-check-label" for="sobre_proteccion">Sobre Protección</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input
                                                class="form-check-input"
                                                type="radio"
                                                name="ace_proteccion"
                                                id="afectuoso"
                                                value="Afectuoso y Equilibrado" {{ old('ace_proteccion') == "Afectuoso y Equilibrado" ? 'checked' : '' }}
                                                required
                                            >
                                            <label class="form-check-label" for="afectuoso">Afectuoso y Equilibrado</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input
                                                class="form-check-input"
                                                type="radio"
                                                name="ace_proteccion"
                                                id="desproteccion"
                                                value="Desinterés o Desprotección" {{ old('ace_proteccion') == "Desinterés o Desprotección" ? 'checked' : '' }}
                                                required
                                            >
                                            <label class="form-check-label" for="desproteccion">Desinterés o Desprotección</label>
                                            <div class="invalid-feedback">
                                                Por favor, seleccione una opción.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 d-flex justify-content-center">
                <button class="btn btn-success mb-3 text-white fw-bolder" type="submit">Guardar Información</button>
            </div>
        </form>
    @else
        <div class="col-md-12">
            {{--  <div class="d-flex justify-content-center mt-3">
                <div class="card p-3">
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Aviso!</strong> Este paciente ya tiene un anamnesis.
                    </div>
                    <div class="text-center">
                        <a href="{{ route('anamnesis.show', ['id'=>$existAnamnesis]) }}" class="btn btn-success fw-bolder">Ver anamnesis</a>
                    </div>
                </div>
            </div>  --}}
            <div class="text-center">
                <div class="alert alert-warning alert-dismissible fade show shadow" role="alert">
                    <strong><i class="fa-solid fa-flag"></i> Aviso!</strong> Este paciente ya tiene un anamnesis creado.
                    <a href="{{ route('anamnesis.show', ['id'=>$existAnamnesis]) }}" class="btn btn-success fw-bolder mx-3 mt-2 mt-md-0"><i class="fa-solid fa-circle-arrow-right"></i> Ver anamnesis</a>
                </div>
            </div>
        </div>
    @endif
@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script>
        
    </script>
@endpush
