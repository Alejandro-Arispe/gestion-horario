<?php

namespace App\Models\Administration;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    use HasFactory;

    protected $table = 'usuario';
    protected $primaryKey = 'id_usuario';

    protected $fillable = [
        'username',
        'password',
        'correo',
        'activo',
        'id_rol',
    ];

    protected $hidden = ['password'];

    public function rol()
    {
        return $this->belongsTo(Rol::class, 'id_rol');
    }

    public function hasPermission($permiso)
    {
        return $this->rol->permisos()->where('nombre', $permiso)->exists();
    }
}
