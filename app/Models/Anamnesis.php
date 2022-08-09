<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anamnesis extends Model
{
    use HasFactory;

    protected $fillable = [
        'hijo_id',
        'user_id',
        'em_duracion',
        'em_enfermedades',
        'em_planificacion',
        'em_genero_esperado',
        'em_lesiones',
        'em_estado_emocional',
        'em_alimentacion',
        'em_seguimiento_medico',
        'pr_lugar_atencion',
        'pr_atendido_por',
        'pr_duracion',
        'pr_estado',
        'pr_complicaciones',
        'pr_tipo',
        'rn_apgar',
        'rn_peso',
        'rn_color',
        'rn_llorar',
        'rn_incubadora',
        'rn_posicion_mano',
        'rn_llorar_movimientos',
        'pi_edad_sost_cabeza',
        'pi_edad_sentarse',
        'pi_edad_gateo',
        'pi_edad_caminar',
        'pi_edad_primeras_palabras',
        'pi_edad_primeras_frases',
        'pi_edad_lactacion',
        'pi_lesiones',
        'pi_enfermedades',
        'pi_temperatura',
        'pi_operacion_quirurgica',
        'da_enfermedad',
        'da_problemas_hablar' => 'array',
        'da_lateralidad',
        'da_moja_orina',
        'da_miedo',
        'da_disciplina',
        'da_relacion_hermanos',
        'da_responsabilidad_hogar',
        'da_motivacion_hijo',
        'da_conductas_hijo' => 'array',
        'acf_respeto',
        'acf_emociones_hermano',
        'acf_gusto_trato',
        'acf_comportamiento_hijo',
        'acf_intereses_hijo',
        'acf_profesion_hijo',
        'acf_problemas_preocupantes_hijo',
        'ef_estado_civil',
        'ef_tiempo',
        'ef_causa',
        'ef_hijo_vive',
        'ef_abandono_hogar',
        'af_ambiente_casa',
        'af_causa_discusiones',
        'ace_autoridad',
        'ace_proteccion'
    ];

    /** Un anamnesis pertence a un hijo */
    public function hijo()
    {
        return $this->belongsTo(Hijo::class);
    }

    /** Un anamnesis pertenece a una encargada */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /* public function setProblemasHablarAttribute($value)
    {
        $this->attributes['da_problemas_hablar'] = json_encode($value);
    }

    public function getProblemasHablarAttribute($value)
    {
        return $this->attributes['da_problemas_hablar'] = json_decode($value);
    }
    public function setConductasAttribute($value)
    {
        $this->attributes['da_conductas_hijo'] = json_encode($value);
    }

    public function getConductasAttribute($value)
    {
        return $this->attributes['da_conductas_hijo'] = json_decode($value);
    } */
    /* // Un anamnesis pertenece a un paciente ()
    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }

    // Un anamnesis pertenece a un encargado (user)
    public function user()
    {
        return $this->belongsTo(User::class);
    } */
}
