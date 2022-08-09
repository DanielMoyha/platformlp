<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'caso',
        // 'codigo_paciente',
        'fecha',
        'hora',
        'nombres',
        // 'apellidos',
        'edad',
        'sexo',
        'direccion',
        'telefono',
        'telefono_referencia',
        'estado_civil',
        'anios',
        'nombre_esposo',
        'edad_esposo',
        'grado_instruccion',
        'cantidad_hijos',
        'ocupacion',
        'ingreso_mensual',
        'motivo_consulta',
        'historia_familiar',
        'tipo_familia',
        'tipo',
        'conyugal',
        'materno',
        'paterno',
        'fraterno',
        'diagnostico_social',
        'acciones',
        // 'user_id',
    ];

    /** Un paciente puede tener múltiples hijos */
    public function hijos()
    {
        return $this->hasMany(Hijo::class);
    }

    /** Los usuarios que pertenecen al caso(paciente) */
    /* public function user()
    {
        return $this->belongsToMany(User::class, 'hijos');
    } */

    /** Un paciente puede tener múltiples anamnesis */
    public function anamnesis()
    {
        return $this->hasMany(Anamnesis::class);
    }
}
