<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as AuthenticatableUser;

class Usuario extends AuthenticatableUser implements Authenticatable
{
    use HasFactory;

    protected $table = 'usuarios';
    protected $fillable = ['Usuario', 'Clave', 'Clave_Bcrypt', 'Nombre_completo'];

    public function getAuthPassword()
    {
        return $this->Clave_Bcrypt;
    }
}