<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;

    protected $fillable = [
        'hijo_id',
        'fecha',
        'proxima_fecha',
        'num_sesion',
        // 'sesion',
        'desarrollo',
        'tareas',
        'observacion',
    ];

    /** Una session pertenece a un hijo */
    public function hijo()
    {
        return $this->belongsTo(Hijo::class);
    }
}
