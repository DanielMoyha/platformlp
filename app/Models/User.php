<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'role_id',
        'email',
        'telefono',
        'direccion',
        'ci',
        'estado',
        /* 'profesion',
        'universidad', */
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Un Usuario pertence a un rol
    public function role()
    {
        return $this->belongsTo(Role::class)->select(['name']);
    }

    // Un usuario (encargado) puede tener muchos casos(hijos)
    public function caso_hijo()
    {
        return $this->hasMany(Hijo::class)->select(['user_id']);
    }

    // Un user (encargada) tiene mucho anamnesis
    public function anamnesis()
    {
        return $this->hasMany(Anamnesis::class);
    }

/*     public function hijo()
    {
        return $this->hasMany(Hijo::class);
    } */

    /* // Un usuario (encargado) puede tener muchos anamnesis
    public function anamnesis()
    {
        return $this->hasMany(Anamnesis::class);
    } */
}
