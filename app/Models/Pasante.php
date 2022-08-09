<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasante extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'name',
        'telefono',
        'direccion',
        'universidad',
        'fecha_inicio',
        'fecha_final',
        'estado',
    ];
}
