<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    //un rol puede tener mĂșltiples usuarios
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
