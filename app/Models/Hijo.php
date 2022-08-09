<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hijo extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'paciente_id',
        'nombre',
        'sexo',
        'edad',
        'user_id',
    ];

    /* public function setDateStartAttribute($value)
    {
        //return Carbon::parse('created_at')->format('d-m-Y');
        $this->attributes['created_at'] = Carbon::createFromFormat('d-m-Y', $value)->format('d-m-Y');
    }
    public function getDateStartAttribute()
    {
        return Carbon::createFromFormat('d-m-Y', $this->attributes['created_at'])->format('d-m-Y');
    } */

    /** Muchos hijos pueden pertenecer a un paciente(madre) */
    // Revisar
    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }

    /* public function paciente()
    {
        return $this->belongsToMany(Paciente::class);
    } */

    // Un hijo pertenece a un encargado (user)
    public function user()
    {
        return $this->belongsTo(User::class)->select(['name']);
    }

    /** Un hijo tiene un anamnesis */
    public function anamnesis()
    {
        return $this->hasOne(Anamnesis::class);
    }

    /** Un hijo tiene muchas sesiones */
    public function sesion()
    {
        return $this->hasMany(Session::class);
    }
}
