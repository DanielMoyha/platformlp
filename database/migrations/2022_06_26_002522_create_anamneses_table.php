<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anamneses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hijo_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            // $table->date('fecha_nacimiento');
            // $table->string('edad'); // edad del hijo
            // $table->foreignId('user_id')->constrained()->onDelete('cascade');//encargada
            /** Embarazo */
            $table->string('em_duracion'); // meses
            $table->string('em_enfermedades'); //'si', 'no', 'señales'
            $table->string('em_planificacion');// si, no
            $table->string('em_genero_esperado');// mujer, varon, indiferente
            $table->string('em_lesiones'); // golpes caídas durante el embarazo // si no y cuáles
            $table->string('em_estado_emocional'); // estable, regular, inestable
            $table->string('em_alimentacion'); // Buena, regular, mala
            $table->string('em_seguimiento_medico'); // si, no
            /** Parto */
            $table->string('pr_lugar_atencion'); // Martenológico, casa, otro
            $table->string('pr_atendido_por'); // Médico, familiar, partera
            $table->string('pr_duracion'); // Muy largo, normal, largo
            $table->string('pr_estado'); // Normal, complicado
            $table->string('pr_complicaciones'); // Ninguna o cuáles
            $table->string('pr_tipo'); // Fórceps, Anestaecia, cesárea
            /** Recién Nacido */
            $table->string('rn_apgar'); // apgar?
            $table->string('rn_peso'); // en Kg.
            $table->string('rn_color'); // Morado, negruzco, azul, rosado, otro
            $table->string('rn_llorar'); // si, no
            $table->string('rn_incubadora'); // si, no
            $table->string('rn_posicion_mano'); //si, no
            $table->string('rn_llorar_movimientos');// si, no
            /** Primera Infancia */
            $table->string('pi_edad_sost_cabeza'); // edad
            $table->string('pi_edad_sentarse'); // edad
            $table->string('pi_edad_gateo'); // si, no o edad?
            $table->string('pi_edad_caminar'); // edad
            $table->string('pi_edad_primeras_palabras'); // edad
            $table->string('pi_edad_primeras_frases'); // edad
            $table->string('pi_edad_lactacion'); // hasta qué edad lactó?
            $table->string('pi_lesiones'); // si, no
            $table->string('pi_enfermedades'); // si, no, cuáles
            $table->string('pi_temperatura'); // si, no cuáles
            $table->string('pi_operacion_quirurgica'); // sí, a qué edad, de qué || no
            /** Desarrollo Actual */
            $table->string('da_enfermedad'); // si, no // Tiene alguna enfermedad?
            $table->string('da_problemas_hablar'); // Tartamudea, etc. // escoger varios?
            $table->string('da_lateralidad'); // zurdo, derecho, ambos
            $table->string('da_moja_orina'); // si,cuántas veces a la semana, no || Se moja u orina en la casa
            $table->string('da_miedo'); // si, no, a qué?
            $table->string('da_disciplina'); // Rebelde agresivo, etc // escoger varios o uno?
            $table->string('da_relacion_hermanos'); // rechazo, etc // escoger varios o uno?
            $table->string('da_responsabilidad_hogar'); // No cumple sus responsabilidades   A medias   Normal
            $table->string('da_motivacion_hijo'); // flojo y pasivo, // escoger varios o uno?
            $table->string('da_conductas_hijo'); // Comer demás, etc // ESCOGER VARIOS
            /** ACTITUD DE LA FAMILIA HACIA EL NIÑO O NIÑA  */
            $table->string('acf_respeto'); // Más, igual, menos
            $table->string('acf_emociones_hermano'); // describir
            $table->string('acf_gusto_trato'); // describir
            $table->string('acf_comportamiento_hijo'); // Excelente    Deficiente   Bueno   Pésimo
            $table->string('acf_intereses_hijo'); // describir
            $table->string('acf_profesion_hijo'); // ¿Qué profesión quisiera que su hijo tenga?
            $table->string('acf_problemas_preocupantes_hijo'); // describir
            /** Estructura familiar */
            $table->string('ef_estado_civil'); // casados o concubinos
            $table->string('ef_tiempo'); //
            $table->string('ef_causa'); //
            $table->string('ef_hijo_vive'); // el hijo vive con?
            $table->string('ef_abandono_hogar'); // madre, padre, ninguno
            /** AMBIENTE FAMILIAR */
            $table->string('af_ambiente_casa'); // Casi siempre tranquilo, etc // escoger uno
            $table->string('af_causa_discusiones'); // describir
            /** ACTITUDES EDUCATIVAS EN LOS PADRES  */
            $table->string('ace_autoridad'); // Muy fuerte, etc // escoger uno
            $table->string('ace_proteccion'); // Sobre protección, etc // escoger uno
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anamneses');
    }
};
