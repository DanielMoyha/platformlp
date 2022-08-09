@extends('layouts.dashboard_Psico')

@section('titulo')
    Mostrando Anamnesis
@endsection

@push('styles')
    <!-- CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/css/toastr.css" rel="stylesheet" />
@endpush

@section('content')
    <div class="d-md-flex justify-content-between">

        <ol class="breadcrumb mb-md-4">
            <li class="breadcrumb-item active">Anamnesis de: <span class="fst-italic fw-bold">{{ $anamnesis->hijo->nombre }}</span></li>
        </ol>
        <div class="mb-3 mb-md-0">
            <a href="{{ route('session.create', $anamnesis->hijo->id) }}" class="btn btn-warning text-black-50 fw-bolder mx-2"><i class="fa-solid fa-calendar-plus mx-1"></i> Programar Sesión</a>
            <a href="{{ route('anamnesis') }}" class="btn btn-danger fw-bolder"><i class="fa-solid fa-arrow-left"></i> Regresar</a>
        </div>
    </div>

    <div class="card border-0 mb-4 shadow">
        <div class="card-header text-center text-white bg-info fw-bold h4"><i class="fa-solid fa-person-pregnant"></i> Embarazo</div>
        <div class="card-body">
            <div class="row">
                <!--1. Duración del embarazo-->
                <div class="col-md-3 mb-3">
                    <label for="em_duracion" class="form-label fw-bold-600">
                        <i class="fa-solid fa-calendar-week"></i> Duración:
                    </label>
                    <span class="text-muted fst-italic">{{ $anamnesis->em_duracion }} Meses</span>
                </div>

                <!--2. Enfermedades durante el embarazo-->
                <div class="col-md-3 mb-3">
                    <label for="em_enfermedades" class="form-label fw-bold-600">
                        <i class="fa-solid fa-head-side-mask"></i> Enfermedades:
                    </label>
                    <span class="text-muted fst-italic">{{ $anamnesis->em_enfermedades }}</span>
                </div>

                <!--3. Fue un embarazo planificado-->
                <div class="col-md-3 mb-3">
                    <label class="form-label fw-bold-600">
                        Embarazo planificado:
                    </label>
                    <span class="text-muted fst-italic">{{ $anamnesis->em_planificacion }}</span>
                </div>

                <!--5.	Golpes y caídas durante el embarazo -->
                <div class="col-md-3 mb-3">
                    <label class="form-label fw-bold-600">
                        <i class="fa-solid fa-person-falling-burst"></i> Golpes y caídas:
                    </label>
                    <span class="text-muted fst-italic">{{ $anamnesis->em_lesiones }}</span>
                </div>

                <!--4.	Que se esperaba que fuera el bebé-->
                <div class="col-md-5 mb-3">
                    <label class="form-label fw-bold-600">
                        <i class="fa-solid fa-mars-and-venus"></i> Género esperado del bebé:
                    </label>
                    <span class="text-muted fst-italic">{{ $anamnesis->em_genero_esperado }}</span>
                </div>

                <!--6.	Estado emocional de la madre y de la familia -->
                <div class="col-md-7 mb-3">
                    <label class="form-label fw-bold-600">
                        <i class="fa-solid fa-heart-pulse"></i> Estado emocional de la madre y de la familia:
                    </label>
                    <span class="text-muted fst-italic">{{ $anamnesis->em_estado_emocional }}</span>
                </div>

                <!--7.	Ha tenido una alimentación-->
                <div class="col-md-5 mb-3">
                    <label class="form-label fw-bold-600">
                        <i class="fa-solid fa-utensils"></i> Ha tenido una alimentación:
                    </label>
                    <span class="text-muted fst-italic">{{ $anamnesis->em_alimentacion }}</span>
                </div>

                <!--8.	La madre realizo seguimiento médico prenatal-->
                <div class="col-md-7 mb-3">
                    <label class="form-label fw-bold-600">
                        <i class="fa-solid fa-hospital-user"></i> La madre realizo seguimiento medico prenatal:
                    </label>
                    <span class="text-muted fst-italic">{{ $anamnesis->em_seguimiento_medico }}</span>
                </div>
            </div>
        </div>
    </div>

    <div class="card border-0 mb-4 shadow">
        <div class="card-header text-center text-white bg-info fw-bold h4"><i class="fa-solid fa-bed-pulse"></i> Parto</div>
        <div class="card-body">
            <div class="row">
                <!--1. ¿Dónde fue atendido?-->
                <div class="col-md-3 mb-3">
                    <label class="form-label fw-bold-600">
                        <i class="fa-solid fa-hospital"></i> Atendido en:
                    </label>
                    <span class="text-muted fst-italic">{{ $anamnesis->pr_lugar_atencion }}</span>
                </div>

                <!--2.	¿Quién lo atendió?-->
                <div class="col-md-3 mb-3">
                    <label class="form-label fw-bold-600">
                        <i class="fa-solid fa-user-doctor"></i> Atendido por:
                    </label>
                    <span class="text-muted fst-italic">{{ $anamnesis->pr_atendido_por }}</span>
                </div>

                <!--3.	La duración del trabajo de parto fue: -->
                <div class="col-md-3 mb-3">
                    <label class="form-label fw-bold-600">
                        <i class="fa-solid fa-clock"></i> Duración:
                    </label>
                    <span class="text-muted fst-italic">{{ $anamnesis->pr_duracion }}</span>
                </div>

                <!--4.	El parto fue: -->
                <div class="col-md-3 mb-3">
                    <label class="form-label fw-bold-600">
                        <i class="fa-solid fa-bars-progress"></i> El parto fue:
                    </label>
                    <span class="text-muted fst-italic">{{ $anamnesis->pr_estado }}</span>
                </div>

                <!--5.	¿Qué complicaciones se presentaron?-->
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold-600" for="complicaciones">
                        <i class="fa-solid fa-clipboard-list"></i> Complicaciones presentadas:
                    </label>
                    <span class="text-muted fst-italic">{{ $anamnesis->pr_complicaciones }}</span>
                </div>

                <!--6. Durante el parto se empleo-->
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold-600">
                        <i class="fa-solid fa-clipboard-question"></i> Durante el parto se empleó:
                    </label>
                    <span class="text-muted fst-italic">{{ $anamnesis->pr_tipo }}</span>
                </div>
            </div>
        </div>
    </div>

    <div class="card border-0 mb-4 shadow">
        <div class="card-header text-center text-white bg-info fw-bold h4"><i class="fa-solid fa-baby"></i> Recién Nacido</div>
        <div class="card-body">
            <div class="row">
                <!--1. APGAR-->
                <div class="col-md-2 mb-3">
                    <label class="form-label fw-bold-600">
                        APGAR:
                    </label>
                    <span class="text-muted fst-italic">{{ $anamnesis->rn_apgar }}</span>
                </div>

                <!--2. Peso del niño al nacer-->
                <div class="col-md-3 mb-3">
                    <label for="peso" class="form-label fw-bold-600">
                        <i class="fa-solid fa-weight-scale"></i> Peso del niño al nacer:
                    </label>
                    <span class="text-muted fst-italic">{{ $anamnesis->rn_peso }}</span>
                </div>

                <!--3. Al nacer el niño tenía color aproximado al:-->
                <div class="col-md-7 mb-3">
                    <label class="form-label fw-bold-600">
                        <i class="fa-solid fa-droplet"></i> Al nacer el niño tenía color aproximado al:
                    </label>
                    <span class="text-muted fst-italic">{{ $anamnesis->rn_color }}</span>
                </div>

                <!--5. ¿Fue necesario el uso de incubadora?-->
                <div class="col-md-5 mb-3">
                    <label class="form-label fw-bold-600">
                        ¿Fue necesario el uso de incubadora?:
                    </label>
                    <span class="text-muted fst-italic">{{ $anamnesis->rn_incubadora }}</span>

                </div>

                <!--4. ¿El niño lloro inmediatamente después de haber nacido?-->
                <div class="col-md-7 mb-3">
                    <label class="form-label fw-bold-600">
                        <i class="fa-solid fa-face-sad-cry"></i> ¿El niño lloró inmediatamente después de haber nacido?:
                    </label>
                    <span class="text-muted fst-italic">{{ $anamnesis->rn_llorar }}</span>
                </div>


                <!--6. ¿Cerraba la mano cuando se colocaba un objeto o un dedo?-->
                <div class="col-md-5 mb-3">
                    <label class="form-label fw-bold-600">
                        <i class="fa-solid fa-hand-back-fist"></i> ¿Cerraba la mano cuando se colocaba un objeto o un dedo?:
                    </label>
                    <span class="text-muted fst-italic">{{ $anamnesis->rn_posicion_mano }}</span>
                </div>

                <!--7. ¿Lloraba o se sobresaltaba ante ruidos o movimientos muy fuertes?-->
                <div class="col-md-7 mb-3">
                    <label class="form-label fw-bold-600">
                        <i class="fa-solid fa-face-sad-cry"></i> ¿Lloraba o se sobresaltaba ante ruidos o movimientos muy fuertes?:
                    </label>
                    <span class="text-muted fst-italic">{{ $anamnesis->rn_llorar_movimientos }}</span>
                </div>
            </div>
        </div>
    </div>

    <div class="card border-0 mb-4 shadow">
        <div class="card-header text-center text-white bg-info fw-bold h4"><i class="fa-solid fa-child"></i> Primera Infancia</div>
        <div class="card-body">
            <div class="row">
                <!--1. A que edad sostuvo la cabeza por si mismo -->
                <div class="col-md-4 mb-3">
                    <label for="edad_cabeza" class="form-label fw-bold-600">
                        ¿A que edad sostuvo la cabeza por si mismo?:
                    </label>
                    <span class="text-muted fst-italic">{{ $anamnesis->pi_edad_sost_cabeza }}</span>
                </div>

                <!--2. A qué edad se sentó-->
                <div class="col-md-4 mb-3">
                    <label for="edad_sentarse" class="form-label fw-bold-600">
                        ¿A qué edad se sentó?:
                    </label>
                    <span class="text-muted fst-italic">{{ $anamnesis->pi_edad_sentarse }}</span>
                </div>

                <!--3. A qué edad empezó a gatear-->
                <div class="col-md-4 mb-3">
                    <label for="edad_gateo" class="form-label fw-bold-600">
                        ¿A qué edad empezó a gatear?:
                    </label>
                    <span class="text-muted fst-italic">{{ $anamnesis->pi_edad_gateo }}</span>
                </div>

                <!--4. A qué edad empezó a caminar -->
                <div class="col-md-4 mb-3">
                    <label for="edad_caminar" class="form-label fw-bold-600">
                        <i class="fa-solid fa-person-walking"></i> ¿A qué edad empezó a caminar?:
                    </label>
                    <span class="text-muted fst-italic">{{ $anamnesis->pi_edad_caminar }}</span>
                </div>

                <!--5.	A que edad dijo sus primeras palabras -->
                <div class="col-md-4 mb-3">
                    <label for="edad_palabras" class="form-label fw-bold-600">
                        ¿A que edad dijo sus primeras palabras?:
                    </label>
                    <span class="text-muted fst-italic">{{ $anamnesis->pi_edad_primeras_palabras }}</span>
                </div>

                <!--6.	A qué edad dijo sus primeras frases -->
                <div class="col-md-4 mb-3">
                    <label for="edad_frases" class="form-label fw-bold-600">
                        ¿A qué edad dijo sus primeras frases?:
                    </label>
                    <span class="text-muted fst-italic">{{ $anamnesis->pi_edad_primeras_frases }}</span>
                </div>

                <!--7.	¿Hasta qué edad lactó? -->
                <div class="col-md-4 mb-3">
                    <label for="edad_lactacion" class="form-label fw-bold-600">
                        ¿Hasta qué edad lactó?
                    </label>
                    <span class="text-muted fst-italic">{{ $anamnesis->pi_edad_lactacion }}</span>
                </div>

                <!--8.	Tuvo golpes fuertes en la cabeza y después del mismo vomitó o sangró-->
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-bold-600">
                        <i class="fa-solid fa-burst"></i> ¿Tuvo golpes fuertes en la cabeza y después del mismo vomitó o sangró?:
                    </label>
                    <span class="text-muted fst-italic">{{ $anamnesis->pi_lesiones }}</span>
                </div>

                <!--9. Tuvo enfermedades graves durante el primer año de vida -->
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-bold-600">
                        <i class="fa-solid fa-viruses"></i> ¿Tuvo enfermedades graves durante el primer año de vida?:
                    </label>
                    <span class="text-muted fst-italic">{{ $anamnesis->pi_enfermedades }}</span>
                </div>

                <!--10.	Tuvo alguna vez temperatura alta durante la cual sufrió ataques y delirios-->
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold-600">
                        <i class="fa-solid fa-temperature-arrow-up"></i> ¿Tuvo alguna vez temperatura alta durante la cual sufrió ataques y delirios?:
                    </label>
                    <span class="text-muted fst-italic">{{ $anamnesis->pi_temperatura }}</span>
                </div>

                <!--11.	¿Su niño fue sometido a una operación quirúrgica?-->
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold-600">
                        <i class="fa-solid fa-hospital"></i> ¿Su niño fue sometido a una operación quirúrgica?
                    </label>
                    <span class="text-muted fst-italic">{{ $anamnesis->pi_operacion_quirurgica }}</span>
                </div>
            </div>
        </div>
    </div>

    <div class="card border-0 mb-4 shadow">
        <div class="card-header text-center text-white bg-info fw-bold h4"><i class="fa-solid fa-calendar"></i> Desarrollo Actual</div>
        <div class="card-body">
            <div class="row">
                <!--1. ¿Tiene alguna enfermedad?-->
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-bold-600">
                        <i class="fa-solid fa-vial-virus"></i> ¿Tiene alguna enfermedad?:
                    </label>
                    <span class="text-muted fst-italic">{{ $anamnesis->da_enfermedad }}</span>
                </div>

                <!--2. ¿Tiene problemas al hablar?-->
                <div class="col-md-4 mb-3">
                    <label for="problema_hablar" class="form-label fw-bold-600">
                        ¿Tiene problemas al hablar?:
                    </label>
                    <span class="text-muted fst-italic">{{ $anamnesis->da_problemas_hablar }}</span>
                </div>

                <!--3. Lateralidad-->
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-bold-600">
                        <i class="fa-solid fa-hand"></i> Lateralidad:
                    </label>
                    <span class="text-muted fst-italic">{{ $anamnesis->da_lateralidad }}</span>
                </div>

                <!--4. Se moja u orina en la casa-->
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-bold-600">
                        ¿Se moja u orina en la casa?:
                    </label>
                    <span class="text-muted fst-italic">{{ $anamnesis->da_moja_orina }}</span>
                </div>

                <!--5. ¿Tiene miedo a algo o a alguien?-->
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-bold-600">
                        <i class="fa-solid fa-person-harassing"></i> ¿Tiene miedo a algo o a alguien?:
                    </label>
                    <span class="text-muted fst-italic">{{ $anamnesis->da_miedo }}</span>
                </div>

                <!--6. La disciplina en la casa es:-->
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-bold-600">
                        <i class="fa-solid fa-person-digging"></i> La disciplina en la casa es:
                    </label>
                    <span class="text-muted fst-italic">{{ $anamnesis->da_disciplina }}</span>
                </div>

                <!--7. Relación con los hermanos -->
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-bold-600">
                        <i class="fa-solid fa-user-group"></i> Relación con los hermanos:
                    </label>
                    <span class="text-muted fst-italic">{{ $anamnesis->da_relacion_hermanos }}</span>
                </div>

                <!--8.	Responsabilidad en el hogar -->
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-bold-600">
                        <i class="fa-solid fa-house-chimney-user"></i> Responsabilidad en el hogar:
                    </label>
                    <span class="text-muted fst-italic">{{ $anamnesis->da_responsabilidad_hogar }}</span>
                </div>

                <!--9.	Motivación de su hijo -->
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-bold-600">
                        <i class="fa-solid fa-child"></i> Motivación de su hijo:
                    </label>
                    <span class="text-muted fst-italic">{{ $anamnesis->da_motivacion_hijo }}</span>
                </div>

                <!--10.	Marque las conductas que se apliquen a su hijo -->
                <div class="col-md-12">
                    <label for="problema_hablar" class="form-label fw-bold-600">
                        <i class="fa-solid fa-pen"></i> Marque las conductas que se apliquen a su hijo:
                    </label>
                    <div class="text-muted fst-italic">{{ $anamnesis->da_conductas_hijo }}</div>
                </div>
            </div>
        </div>
    </div>

    <div class="card border-0 mb-4 shadow">
        <div class="card-header text-center text-white bg-info fw-bold h4"><i class="fa-solid fa-hands-holding-child"></i> Actitud de la Familia hacia el niño(a)</div>
        <div class="card-body">
            <div class="row">
                <!--1. Como padres lo respetan, lo quieren, lo protegen, mas o menos al hijo que al resto de sus hermanos -->
                <div class="col-md-11 mb-3">
                    <label class="form-label fw-bold-600">
                        <i class="fa-solid fa-handshake-angle"></i> Los padres respetan, lo quieren, lo protegen, más o menos al hijo que al resto de sus hermanos:
                    </label>
                    <span class="text-muted fst-italic">{{ $anamnesis->acf_respeto }}</span>
                </div>

                <!--2.	Que piensan y sienten los hermanos del niño-->
                <div class="col-md-6 mb-3">
                    <label for="emociones_hermano" class="form-label fw-bold-600">
                        ¿Qué piensan y sienten los hermanos del niño?:
                    </label>
                    <div class="text-muted fst-italic">{{ $anamnesis->acf_emociones_hermano }}</div>
                </div>

                <!--3. Cómo le gusta o exige que se le trate-->
                <div class="col-md-6 mb-3">
                    <label for="gusto" class="form-label fw-bold-600">
                        ¿Cómo le gusta o exige que se le trate?:
                    </label>
                    <div class="text-muted fst-italic">{{ $anamnesis->acf_gusto_trato }}</div>
                </div>

                <!--4. Cómo califica el comportamiento de su hijo -->
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold-600">
                        ¿Cómo califica el comportamiento de su hijo?:
                    </label>
                    <div class="text-muted fst-italic">{{ $anamnesis->acf_comportamiento_hijo }}</div>
                </div>

                <!--5. A parte de estudiar ¿Qué cosas le interesa o le gusta hacer?-->
                <div class="col-md-6 mb-3">
                    <label for="intereses_hijo" class="form-label fw-bold-600">
                        <i class="fa-solid fa-person-dots-from-line"></i> ¿A parte de estudiar, qué cosas le interesa o le gusta hacer?:
                    </label>
                    <div class="text-muted fst-italic">{{ $anamnesis->acf_intereses_hijo }}</div>
                </div>

                <!--6. ¿Qué profesión quisiera que su hijo tenga?-->
                <div class="col-md-6 mb-3">
                    <label for="profesion_hijo" class="form-label fw-bold-600">
                        <i class="fa-solid fa-user-tie"></i> ¿Qué profesión quisiera que su hijo tenga?:
                    </label>
                    <div class="text-muted fst-italic">{{ $anamnesis->acf_profesion_hijo }}</div>
                </div>

                <!--7. ¿Su hijo tiene algún problema que a usted le preocupa?-->
                <div class="col-md-6 mb-3">
                    <label for="prob_preo_hijo" class="form-label fw-bold-600">
                        <i class="fa-solid fa-exclamation"></i> ¿Su hijo tiene algún problema que a usted le preocupa?:
                    </label>
                    <div class="text-muted fst-italic">{{ $anamnesis->acf_problemas_preocupantes_hijo }}</div>
                </div>
            </div>
        </div>
    </div>

    <div class="card border-0 mb-4 shadow">
        <div class="card-header text-center text-white bg-info fw-bold h4"><i class="fa-solid fa-people-roof"></i> Estructura Familiar</div>
        <div class="card-body">
            <div class="row">
                <!--1. Los padres están -->
                <div class="col-md-3 mb-3">
                    <label class="form-label fw-bold-600">
                        <i class="fa-regular fa-heart"></i> Los padres están:
                    </label>
                    <div class="text-muted fst-italic">{{ $anamnesis->ef_estado_civil }}</div>
                </div>

                <!--2. Hace qué tiempo-->
                <div class="col-md-3 mb-3">
                    <label for="tiempo" class="form-label fw-bold-600">
                        <i class="fa-solid fa-user-clock"></i> ¿Hace qué tiempo?
                    </label>
                    <div class="text-muted fst-italic">{{ $anamnesis->ef_tiempo }}</div>
                </div>

                <!--3. Causa-->
                <div class="col-md-3 mb-3">
                    <label for="causa" class="form-label fw-bold-600">
                        <i class="fa-regular fa-circle-question"></i> ¿Por qué causa?
                    </label>
                    <div class="text-muted fst-italic">{{ $anamnesis->ef_causa }}</div>
                </div>

                <!--4. El hijo vive con-->
                <div class="col-md-3 mb-3">
                    <label for="hijo_vive" class="form-label fw-bold-600">
                        <i class="fa-solid fa-house-chimney-user"></i> El hijo vive con:
                    </label>
                    <div class="text-muted fst-italic">{{ $anamnesis->ef_hijo_vive }}</div>
                </div>

                <!--5. Alguno de los padres hizo abandono del hogar ¿quién?-->
                <div class="col-md-12 mb-3">
                    <label for="abandono" class="form-label fw-bold-600">
                        <i class="fa-solid fa-house-chimney-crack"></i> Alguno de los padres hizo abandono del hogar ¿quién?
                    </label>
                    <div class="text-muted fst-italic">{{ $anamnesis->ef_abandono_hogar }}</div>
                </div>
            </div>
        </div>
    </div>

    <div class="card border-0 mb-4 shadow">
        <div class="card-header text-center text-white bg-info fw-bold h4"><i class="fa-solid fa-people-group"></i> Ambiente Familiar</div>
        <div class="card-body">
            <div class="row">
                <!--1. En la casa se vive un ambiente  -->
                <div class="col-md-5 mb-3">
                    <label class="form-label fw-bold-600">
                        <i class="fa-solid fa-house-chimney-medical"></i> En la casa se vive un ambiente:
                    </label>
                    <div class="text-muted fst-italic">{{ $anamnesis->af_ambiente_casa }}</div>
                </div>

                <!--2. A causa de qué se produce las discusiones y peleas en la familia-->
                <div class="col-md-7 mb-3">
                    <label for="causa_discuciones" class="form-label fw-bold-600">
                        <i class="fa-solid fa-person-harassing"></i> A causa de qué se produce las discusiones y peleas en la familia:
                    </label>
                    <div class="text-muted fst-italic">{{ $anamnesis->af_causa_discusiones }}</div>
                </div>
            </div>
        </div>
    </div>

    <div class="card border-0 mb-4 shadow">
        <div class="card-header text-center text-white bg-info fw-bold h4"><i class="fa-solid fa-person-chalkboard"></i> Actitudes Educativas en los Padres</div>
        <div class="card-body">
            <div class="row">
                <!--1. Autoridad -->
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold-600">
                        <i class="fa-solid fa-person-arrow-up-from-line"></i> Autoridad:
                    </label>
                    <span class="text-muted fst-italic">{{ $anamnesis->ace_autoridad }}</span>
                </div>

                <!--2. Protección -->
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold-600">
                        <i class="fa-solid fa-person-breastfeeding"></i> Protección:
                    </label>
                    <span class="text-muted fst-italic">{{ $anamnesis->ace_proteccion }}</span>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/js/toastr.js"></script>
@endpush
